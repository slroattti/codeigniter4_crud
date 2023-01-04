<?php namespace App\Controllers;
use App\Models\NameModel;
use CodeIgniter\Controller;

class NameCrud extends Controller {
    //get data
    public function index() {
        $NameModel = new NameModel();
        $data['users'] = $NameModel->orderBy('id', 'DESC')->findAll();
        return view('namelist', $data);
    }
    //create data
    public function create() {
        return view('addname');
    }
    //add data
    public function store() {
        $NameModel = new NameModel();
        $data = [
            'username' => $this->request-getVal('username'),
            'password' => $this->request-getVal('password'),
        ];
        $NameModel->insert($data);
        return $this->response->redirect(site_url('/namelist'));
    }
    //show single name
    public function singleUser($id = null) {
        $NameModel = new NameModel();
        $data['name_obj'] = $NameModel->where('id', $id)->first();
        return view('editname', $data);
    }

    //update data
    public function update() {
        $NameModel = new NameModel();
        $id = $this->request-getVal('id');
        $data = [
            'username' => $this->request-getVal('username'),
            'password' => $this->request-getVal('password'),
        ];
        $NameModel->update($id, $data);
        return $this->response->redirect(site_url('/namelist'));
    }

    //delete data
    public function delete($id = null) {
        $NameModel = new NameModel();
        $id = $this->request-getVal('id');
        $data['user'] = $NameModel->where('id', $id)->delete($id);
        return $this->response->redirect(site_url('/namelist'));
    }
}



?>