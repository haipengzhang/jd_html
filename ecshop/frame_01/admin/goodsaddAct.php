<?php 

	define('ACC', true);
	require('../include/init.php');


	print_r($_POST);

	$data = array();

	//数据的检验
	$data['goods_name'] = trim($_POST['goods_name']);
	if ($data['goods_name'] == '') {
		echo "商品名不能为空";
		exit;
	}
	$data['goods_sn'] = trim($_POST['goods_sn']);
	$data['cat_id'] = $_POST['cat_id'] + 0;
	$data['shop_price'] = $_POST['shop_price'] + 0;
	$data['market_price'] = $_POST['market_price'] + 0;
	$data['goods_desc'] = trim($_POST['goods_desc']);
	$data['goods_weight'] = $_POST['goods_weight'] * $_POST['weight_unit'];
	$data['is_best'] = isset($_POST['is_best'])?1:0;
	$data['is_new'] = isset($_POST['is_new'])?1:0;
	$data['is_hot'] = isset($_POST['is_hot'])?1:0;
	$data['is_on_sale'] = isset($_POST['is_on_sale'])?1:0;
	$data['goods_brief'] = trim($_POST['goods_brief']);
	$data['add_time'] = time();

	print_r($data);

	$goods = new GoodsModel();

	if ($goods->add($data)) {
		echo "商品发布成功";
	} else {
		echo "商品发布失败";
	}

 ?>