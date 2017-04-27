<?php 
namespace Home\Model;
use Think\Model;
class UserModel extends Model
{
	public function index() {
        // $email = $_POST['email'];
        $model = D('userinfo');
        $data['username'] = 'haopengfei';
        $data['userpass'] = '1233456s';
        $data['uniqid'] = 'kdfjklsdjf23423423';
        $data['userstatus'] = 0;
        $data['useremaill'] = 'fdsfsdf';
        $query = $model->add($data);
        return $query;
	}
}
 ?>