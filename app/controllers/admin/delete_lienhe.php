<?php
class delete_lienhe extends Controller
{
    private $data, $model;

    function __construct()
    {
        $this->model = $this->model('Database');
    }

    function index()
    {
       $filterAll = filter();
       if(!empty($filterAll)) {
        echo '<pre>';
        print_r($filterAll);
        echo '</pre>';
        $id = $filterAll['id'];
        $this->model->delete('lien_he', "WHERE id = '$id'");
        redirect('admin/lien_he');
       }
    }
}
?>