<?php
use Casegame;
use Phalcon\Http\Request;
use Phalcon\Mvc\View;
use Users;
use Itmes;

class AdminController extends \Phalcon\Mvc\Controller
{

    public function initialize() //this constructor/initializator is executed even if action isn't exist
    {


        if($this->cookies->has('remember_token')){
            $user = Users::findFirst("userid = " . $this->cookies->get('remember_token')->getValue());
            if ($user !== false) {
                $this->view->setVar("u", $user);
                $this->session->set("auth", ["userid" => $user->userid, "admin" => $user->admin]);
            }
        }
        $this->view->setRenderLevel(View::LEVEL_LAYOUT)->setLayout('admin');
    }

    public function indexAction()
    {

        $this->view->pick('admin/index');
    }

    public function caseAction()
    {
        $case = Casegame::find();
        $this->view->setVars(["case" => $case]);
        $this->view->pick('admin/case/index');
    }

    public function caseidAction($id)
    {
        $case = Casegame::findFirst("id = " . $id);
        $this->view->setVars(["case" => $case]);
        $this->view->pick('admin/case/case');
    }

    public function casenewAction()
    {
        $this->view->pick('admin/case/new');
    }

    public function caseeditAction()
    {
        $request = new Request();

        if (!is_null($request->getPost('id'))) {
            $case = Casegame::findFirst("id = " . $request->getPost('id'));
            $flname = $case->image;
        } else $case = new Casegame();


        // Проверяем что файл загрузился
        if ($this->request->hasFiles()) {
            $files = $this->request->getUploadedFiles();

            // Выводим имя и размер файла
            foreach ($files as $file) {
                // Выводим детали

                if (!empty($file->getName())) {

                    $flname = "files/" . $file->getName();

                    // Перемещаем в приложение
                    $file->moveTo(
                        "files/" . $file->getName()
                    );
                }

            }
        }



        $case->save([ 'maxwin' => $request->getPost('maxwin'), 'banker' => $request->getPost('banker'), 'name' => $request->getPost('name'), 'image' => $flname, 'position' => $request->getPost('position'),
            'price' => $request->getPost('price'), 'status' => $request->getPost('status'), 'type' => $request->getPost('type')]);


        return $this->response->redirect('/admin/case');

    }


    public function itemsAction()
    {

        $items = $this->modelsManager->createBuilder()
            ->from('Items')->columns('Items.id,Casegame.name,Items.image,Items.price')
            ->join('Casegame','Casegame.id = Items.caseid')
            ->orderBy('Items.id')->groupBy('Items.id')
            ->getQuery()
            ->execute();
        $this->view->setVars(["items" => $items]);
        $this->view->pick('admin/items/index');
    }

    public function itemsidAction($id)
    {
        $items = Items::findFirst("id = " . $id);
        $case = Casegame::find();
        $this->view->setVars(["items" => $items, "case" => $case]);
        $this->view->pick('admin/items/items');
    }

    public function itemsnewAction()
    {
        $case = Casegame::find();
        $this->view->setVars(["case" => $case]);
        $this->view->pick('admin/items/new');
    }

    public function itemseditAction()
    {
        $request = new Request();

        if (!is_null($request->getPost('id'))) {
            $items = Items::findFirst("id = " . $request->getPost('id'));
            $flname = $items->image;
        } else $items = new Items();


        // Проверяем что файл загрузился
        if ($this->request->hasFiles()) {
            $files = $this->request->getUploadedFiles();

            // Выводим имя и размер файла
            foreach ($files as $file) {
                // Выводим детали

                if (!empty($file->getName())) {

                    $flname = "files/" . $file->getName();

                    // Перемещаем в приложение
                    $file->moveTo(
                        "files/" . $file->getName()
                    );
                }

            }
        }

        $items->save(['image' => $flname, 'caseid' => $request->getPost('caseid'), 'price' => $request->getPost('price')]);


        return $this->response->redirect('/admin/items');

    }


}

