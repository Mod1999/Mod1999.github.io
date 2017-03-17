<?php

use Casegame;
use Games;
use Items;
use Phalcon\Http\Request;

class GamesController extends \Phalcon\Mvc\Controller
{

    public function playAction()
    {
        if(!$this->cookies->has('remember_token')) return json_encode(["status" => 0, "error" => "Вы не авторизованы"]);
        $request = new Request();
        $case = Casegame::findFirst($request->getPost('gameId'));
        $game = Games::findfirst(['order' => 'id desc', 'caseid = '.$request->getPost('gameId').' and created_at > "'. date('Y-m-d H:i:s', strtotime('-24 hour')).'"' ]);
        if ($case->price == 0 and $game  !== false) {
            return json_encode(["status" => 0, "error" => "Вы уже открывали бесплатный кейс. </br> Следующее открытие через ".$this->downcounter(date('Y-m-d H:i:s',strtotime('+24 hour',strtotime($game->created_at))))]);
        }
        $item = Items::findFirst(["caseid = " . $request->getPost('gameId') . " AND price < " . $case->maxwin, "order" => "RAND()"]);
        $user = Users::findFirst("userid = " . $this->session->auth['userid']);
        $caseprice = $case->price;
        switch ($request->getPost('chance')) {
            case 1:
                $caseprice = $case->price + round($case->price / 10);
                break;
            case 2:
                $caseprice = $case->price + round($case->price / 5);
                break;
            case 3:
                $caseprice = $case->price + round($case->price / 3.33333333333);
                break;

        }
        if ($user->money < $caseprice) return json_encode(["status" => 0, "error" => "Недостаточно средств на балансе"]);
        if ($case->bank > $case->banker) {
            $item = Items::findFirst(["caseid = " . $request->getPost('gameId') . " AND price > " . $case->maxwin, "order" => "RAND()"]);
            $case->save(['bank' => 0]);
        } else {
            $case->save(['bank' => $case->bank += $case->price - $item->price]);
        }
        $user->save(['money' => $user->money -= $caseprice]);
        $game = new Games();
        $game->save(['item' => $item->id, 'userid' => $user->id, 'caseid' => $case->id, 'price' => $item->price]);
        $text = '.. эх не выиграли :(';
        if ($item->price != 0) $text = $item->price . " рублей";
        if ($case->id != 1) $this->redis->publish('new.winner', json_encode(["status" => 1, "id" => $game->id, "userid" => $this->session->auth['userid'], "image" => $item->image, "avatar" => $user->avatar]));
        return json_encode(["status" => 1, "data" => ["result" => $item->id, "text" => $text, "photo" => $item->image, "type" => "1", "balance" => $user->money, "win_sum" => $item->price, "gift" => $item->id]]);

    }

    /**
     * Счетчик обратного отсчета
     *
     * @param mixed $date
     * @return
     */
    function downcounter($date){
        $check_time = strtotime($date) - time();
        if($check_time <= 0){
            return false;
        }

        $days = floor($check_time/86400);
        $hours = floor(($check_time%86400)/3600);
        $minutes = floor(($check_time%3600)/60);
        $seconds = $check_time%60;

        $str = '';
        if($days > 0) $str .= $days.'д ';
        if($hours > 0) $str .=  $hours.'ч ';
        if($minutes > 0) $str .= $minutes.'м ';
        if($seconds > 0) $str .= $seconds.'с ';

        return $str;
    }



}

