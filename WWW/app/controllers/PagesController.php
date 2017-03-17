<?php
use Casegame;
use Games;
use Items;
use Phalcon\Http\Request;
use Phalcon\Mvc\View;
use Users;

class PagesController extends \Phalcon\Mvc\Controller
{


    public function initialize() //this constructor/initializator is executed even if action isn't exist
    {
        $games = [];
        $j = 0;
        foreach (Games::find(['caseid != 1', 'limit' => 18, 'order' => 'id desc']) as $i) {
            $i->case = Casegame::findFirst("id = " . $i->caseid);
            $i->item = Items::findFirst("id = " . $i->item);
            $i->user = Users::findFirst("id = " . $i->userid);
            array_push($games, $i);
            $j++;
        }
        $this->view->setVar("winners", $games);
        if($this->cookies->has('remember_token')){
            $user = Users::findFirst("userid = " . $this->cookies->get('remember_token')->getValue());
            if ($user !== false) {
                $this->view->setVar("u", $user);
                $this->session->set("auth", ["userid" => $user->userid, "admin" => $user->admin]);
            }
        }

    }


    public function caseAction($id)
    {
        // Получаем экземпляр объекта request
        $request = new Request();
        // Проверка что request создан через Ajax
        if ($request->isAjax()) {
            $this->view->disableLevel(View::LEVEL_MAIN_LAYOUT);
        }
        $items = Items::find("caseid = " . $id);
        $case = Casegame::findFirst("id = " . $id);
        $this->view->setVars(["case" => $case, 'items' => $items]);
        $this->view->pick('pages/case');
    }

    public function userAction($id)
    {
        // Получаем экземпляр объекта request
        $request = new Request();
        // Проверка что request создан через Ajax
        if ($request->isAjax()) {
            $this->view->disableLevel(View::LEVEL_MAIN_LAYOUT);
        }
        $user = Users::findFirst("userid = " . $id);
        if($user === false)    return $this->response->redirect('/');
        $items = Items::find("caseid = " . $id);
        $case = Casegame::findFirst("id = " . $id);
        $games = [];
        $j = 0;
        foreach (Games::find(['userid = ' . $user->id, 'order' => 'id desc']) as $i) {
            $i->case = Casegame::findFirst("id = " . $i->caseid);
            $i->case->name = str_replace('Кейс', '', $i->case->name);
            $i->item = Items::findFirst("id = " . $i->item);
            $i->user = Users::findFirst("id = " . $i->userid);
            array_push($games, $i);
            $j++;
        }
        $user->win = Games::sum(['userid = ' . $user->id, 'order' => 'id desc', 'column' => 'price']);
        $this->view->setVars(["case" => $case, 'items' => $items, 'games' => $games,'user' => $user]);
        if ($this->cookies->has('remember_token') and Users::findFirst("userid = " . $this->cookies->get('remember_token')->getValue()) !== false and $id == $this->cookies->get('remember_token')->getValue()) {
            $this->u->partner = 0;
            $this->view->pick('pages/profile');
        } else {
            $this->view->pick('pages/user');
        }
    }


    public function indexAction()
    {


        // Получаем экземпляр объекта request
        $request = new Request();
        // Проверка что request создан через Ajax
        if ($request->isAjax()) {
            $this->view->disableLevel(View::LEVEL_MAIN_LAYOUT);
        }
        $case = [];
        $j = 0;
        foreach (Casegame::find() as $i) {
            $i->mwin = Games::sum(['caseid = ' . $i->id, 'order' => 'id desc', 'column' => 'price']);
            $i->minp = Items::minimum(["column" => "price", "conditions" => 'caseid = ' . $i->id]);
            $i->maxp = Items::maximum(["column" => "price", "conditions" => 'caseid = ' . $i->id]);
            array_push($case, $i);
            $j++;
        }
        $top = $this->modelsManager->createBuilder()
            ->from('Users')->columns([ 'top_value' => 'SUM(Games.price)', 'games' => 'SUM(Games.id)','Users.avatar','Users.username','Users.userid','id' => 'Users.id'])
            ->join('Games','Games.userid = Users.id')
          ->orderBy('top_value DESC')
            ->groupBy('Users.id')->limit(10)
            ->getQuery()
            ->execute();

        $this->view->setVars(["case" => $case,"top" => $top]);
        $this->view->pick('pages/index');
    }

    public function faqAction()
    {
        // Получаем экземпляр объекта request
        $request = new Request();
        // Проверка что request создан через Ajax
        if ($request->isAjax()) {
            $this->view->disableLevel(View::LEVEL_MAIN_LAYOUT);
        }
        $this->view->pick('pages/faq');
    }

    public function reviewsAction()
    {
        // Получаем экземпляр объекта request
        $request = new Request();
        // Проверка что request создан через Ajax
        if ($request->isAjax()) {
            $this->view->disableLevel(View::LEVEL_MAIN_LAYOUT);
        }
        $this->view->pick('pages/reviews');
    }

    public function guaranteesAction()
    {
        // Получаем экземпляр объекта request
        $request = new Request();
        // Проверка что request создан через Ajax
        if ($request->isAjax()) {
            $this->view->disableLevel(View::LEVEL_MAIN_LAYOUT);
        }
        $this->view->pick('pages/guarantees');
    }


    public function route404Action()
    {

        $this->response->setStatusCode(404, 'Not Found');
        $this->view->pick('errors/404');
    }

}

