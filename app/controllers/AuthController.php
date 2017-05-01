<?php
use Users;
use Phalcon\Http\Request;

class AuthController extends \Phalcon\Mvc\Controller
{

    public function logoutAction()
    {
        $this->session->destroy();
        $this->cookies->get("remember_token")->delete();
        return $this->response->redirect('/');
    }


    public function loginAction()
    {
        $request = new Request();
        if (!is_null($request->get('code'))) {
            $obj = json_decode($this->curl('https://oauth.vk.com/access_token?client_id=5669530&client_secret=NQUuWPjWqAjvJaJ6de0N&redirect_uri=http://' . $_SERVER['HTTP_HOST'] . '/login&code=' . $request->get('code')));
            if (isset($obj->access_token)) {

                $info = json_decode($this->curl('https://api.vk.com/method/users.get?user_ids&fields=photo_200&access_token=' . $obj->access_token . '&v=V'), true);

                $user = Users::findFirst("userid = " . $info['response'][0]['uid']);

                if ($user !== false) {

                    $user->update(['username' => $info['response'][0]['first_name'] . ' ' . $info['response'][0]['last_name'],

                        'avatar' => "files/" . basename($info['response'][0]['photo_200'])]);


                } else {

                    $user = new Users();

                    $user->save([
                        'username' => $info['response'][0]['first_name'] . ' ' . $info['response'][0]['last_name'],
                        'avatar' => "files/" . basename($info['response'][0]['photo_200']),
                        'userid' => $info['response'][0]['uid'], 'code' => substr(md5($info['response'][0]['uid']), 0, 12)

                    ]);

                }

                file_put_contents("files/" . basename($info['response'][0]['photo_200']), file_get_contents($info['response'][0]['photo_200']));
                $this->cookies->set("remember_token", $user->userid, time() + 15 * 3650000);
                $this->session->set("auth", ["userid" => $user->userid, "admin" => $user->admin]);
                return $this->response->redirect('/');
            }
        } else {
            return $this->response->redirect('https://oauth.vk.com/authorize?client_id=5669530&display=page&redirect_uri=http://' . $_SERVER['HTTP_HOST'] . '/login&scope=friends,photos,status,offline,&response_type=code&v=5.53');
        }


    }

    public function curl($url)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        $output = curl_exec($ch);
        curl_close($ch);
        return $output;
    }


}

