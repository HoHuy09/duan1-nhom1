<?php

function pdo_connect()
{
    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $dbName = 'shoppings';
    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbName", $user, $pass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        die('Kết nối thất bại' . $e->getMessage());
    }
    return $conn;
}

function user_login($acc)
{
    $conn = pdo_connect();
    $stmt = $conn->prepare("SELECT * FROM user WHERE account = '$acc'");
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    return $userInfo = $stmt->fetch();
}

function user_create_acc($acc, $pwd, $name, $email, $file, $roles)
{
    try {
        $conn = pdo_connect();
        $pwd = password_hash($pwd, PASSWORD_DEFAULT);
        $stmt = $conn->prepare("INSERT INTO user (account, passwd, name, email, avatar,roles)
            VALUES ('$acc', '$pwd', '$name', '$email', '$file','$roles')");
        $stmt->execute();
        echo '<script>alert("Đăng kí tài khoản thành công")</script>';
    } catch (PDOException $e) {
        die('lỗi kết nối' . $e->getMessage());
    }
}

function select_page($sql)
{
    $conn = pdo_connect();
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    return $listRecord = $stmt->fetchAll();
}

function select_dmuc($sql)
{
    $conn = pdo_connect();
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    return $listRecord = $stmt->fetch();
}

function select_all_product($sql)
{
    try {
        $conn = pdo_connect();
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $list = $stmt->fetchAll();

    } catch (PDOException $e) {
        die('loi' . $e->getMessage());
    }
}

function select_danh_muc()
{
    try {
        $conn = pdo_connect();
        $stmt = $conn->prepare("SELECT * FROM danh_muc ORDER BY id_dm DESC");
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $listCate = $stmt->fetchAll();

    } catch (PDOException $e) {
        die('Loi truy van CSDL' . $e->getMessage());
    }
}

function select_danh_muc_fllow_id($sql, $id)
{
    try {
        $conn = pdo_connect();
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $field = $stmt->fetch();
    } catch (PDOException $e) {
        die('Lỗi truy vấn SQL' . $e->getMessage());
    }
}

function select_thuong_hieu($sql)
{
    try {
        $conn = pdo_connect();
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $listBrand = $stmt->fetchAll();
    } catch (PDOException $e) {
        die('Loi truy van CSDL' . $e->getMessage());
    }
}

function add_product($danh_muc, $name, $target, $price, $brand, $sale, $desc, $date, $status)
{
    $conn = pdo_connect();
    $sql = "INSERT INTO san_pham (id_dm, ten_sp, anh_sp, gia_sp, id_th,
        giam_gia, mo_ta, bao_hanh, trang_thai)
        VALUES('$danh_muc', '$name', ' $target', '$price', '$brand', '$sale', '$desc', '$date', '$status')";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
}

function edit_product($danh_muc, $name, $target, $price, $brand, $sale, $desc, $date, $status, $id)
{
    $conn = pdo_connect();
    if ($target != '') {
        $sql = "UPDATE san_pham SET id_dm='$danh_muc', ten_sp='$name', anh_sp='$target', gia_sp='$price'
        ,id_th='$brand', giam_gia='$sale', mo_ta='$desc', bao_hanh='$date', trang_thai='$status' WHERE id_sp = '$id'";
    } else {
        $sql = "UPDATE san_pham SET id_dm='$danh_muc', ten_sp='$name', gia_sp='$price'
        ,id_th='$brand', giam_gia='$sale', mo_ta='$desc', bao_hanh='$date', trang_thai='$status' WHERE id_sp = '$id'";
    }
    $stmt = $conn->prepare($sql);
    $stmt->execute();
}

function add_category($sql, $name)
{
    try {
        $conn = pdo_connect();
        $stmt = $conn->prepare($sql);
        $stmt->execute();
    } catch (PDOException $e) {
        die('Lỗi truy vấn' . $e->getMessage());
    }
}

function edit_category($sql, $id)
{
    try {
        $conn = pdo_connect();
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        header('Location: ../table_category.php');
    } catch (PDOException $e) {
        die('Lỗi truy vấn' . $e->getMessage());
    }
}

function add_slide($sql, $valua1, $value2, $value3)
{
    try {
        $conn = pdo_connect();
        $stmt = $conn->prepare($sql);
        $stmt->execute();
    } catch (PDOException $e) {
        die('Lỗi truy vấn' . $e->getMessage());
    }
}

function edit_slide($name, $file, $link, $idSlide)
{
    try {
        $conn = pdo_connect();
        if ($file != '') {
            $sql = "UPDATE slide SET ten_slide = '$name', anh_slide = '$file', link_slide = '$link' WHERE id_slide = '$idSlide'";
        } else {
            $sql = "UPDATE slide SET ten_slide = '$name', link_slide = '$link' WHERE id_slide = '$idSlide'";
        }
        $stmt = $conn->prepare($sql);
        $stmt->execute();

    } catch (PDOException $e) {
        die('Lỗi truy vấn' . $e->getMessage());
    }
}

function edit_page($sql, $id_dm)
{
    try {
        $conn = pdo_connect();
        $stmt = $conn->prepare($sql);
        $stmt->execute();
    } catch (Exception $e) {
        die('Loi truy van sql' . $e->getMessage());
    }
}

function delete($sql_delete, $id)
{
    try {
        $conn = pdo_connect();
        $stmt = $conn->prepare($sql_delete);
        $stmt->execute();
    } catch (PDOException $e) {
        die('Lỗi truy vấn' . $e->getMessage());
    }
}

function delete_3($sql, $id, $id_sp)
{
    try {
        $conn = pdo_connect();
        $stmt = $conn->prepare($sql);
        $stmt->execute();
    } catch (PDOException $e) {
        die('Lỗi truy vấn' . $e->getMessage());
    }
}

function select_product_follow_id($sql, $id, $id_dm, $th)
{
    try {
        $conn = pdo_connect();
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $field = $stmt->fetch();
    } catch (PDOException $e) {
        die('Lỗi truy vấn SQL' . $e->getMessage());
    }
}

function select_product_detail_follow_id($sql, $id)
{
    try {
        $conn = pdo_connect();
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $field = $stmt->fetch();
    } catch (PDOException $e) {
        die('Lỗi truy vấn SQL' . $e->getMessage());
    }
}

function select_and_pagination_product_home($value)
{
    try {
        $conn = pdo_connect();
        $stmt = $conn->prepare("SELECT count(id_sp) FROM san_pham");
        $stmt->execute();
        $totalRecord = $stmt->fetchColumn();
        $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
        $limit = $value;
        $totalPage = ceil($totalRecord / $limit);
        if ($currentPage > $totalPage) {
            $currentPage = $totalPage;
        } else if ($currentPage < 1) {
            $currentPage = 1;
        }
        $start = ($currentPage - 1) * $limit;

        try {
            $stmt = $conn->prepare("SELECT sp.id_sp, sp.ten_sp, sp.anh_sp, sp.gia_sp, sp.trang_thai, sp.id_dm,
                sp.giam_gia, th.ten_th FROM san_pham AS sp
                INNER JOIN thuong_hieu AS th ON sp.id_th = th.id_th WHERE sp.giam_gia = '' LIMIT $start, $limit");
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            return $list = $stmt->fetchAll();
        } catch (PDOException $e) {
            die("Lỗi truy vấn SQL" . $e->getMessage());
        }
    } catch (PDOException $e) {
        die("Lỗi truy vấn SQL" . $e->getMessage());
    }
}

function select_product_phone($sql, $id_dm, $start, $limit)
{
    try {
        $conn = pdo_connect();
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $limitProduct = $stmt->fetchAll();
    } catch (PDOException $e) {
        die("Lỗi truy vấn SQL" . $e->getMessage());
    }
}

function select_all_product_page($sql, $start, $limit)
{
    try {
        $conn = pdo_connect();
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $limitProduct = $stmt->fetchAll();
    } catch (PDOException $e) {
        die("Lỗi truy vấn SQL" . $e->getMessage());
    }
}

function select_product_follow_cate($th, $dm, $start, $limit)
{
    try {
        $conn = pdo_connect();
        $stmt = $conn->prepare("SELECT * FROM san_pham WHERE id_th = $th && id_dm = $dm LIMIT $start, $limit");
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $limitProduct = $stmt->fetchAll();
    } catch (PDOException $e) {
        die("Lỗi truy vấn SQL" . $e->getMessage());
    }
}

function select_all_follow_order($sql)
{
    try {
        $conn = pdo_connect();
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt->fetchAll();
    } catch (PDOException $e) {
        die('Lỗi truy vấn' . $e->getMessage());
    }
}

function count_all($sql)
{
    try {
        $conn = pdo_connect();
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchColumn();
    } catch (PDOException $e) {
        die('Lỗi truy vấn' . $e->getMessage());
    }
}

function select_slide_follow_id($idSlide)
{
    try {
        $conn = pdo_connect();
        $stmt = $conn->prepare("SELECT * FROM slide WHERE id_slide = $idSlide");
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $field = $stmt->fetch();

    } catch (PDOException $e) {
        die('Lỗi truy vấn SQL' . $e->getMessage());
    }
}

function select_product_sale()
{
    try {
        $conn = pdo_connect();
        $stmt = $conn->prepare("SELECT * FROM san_pham WHERE giam_gia != '' ");
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $listSale = $stmt->fetchAll();
    } catch (PDOEXception $e) {
        die('Lỗi truy vấn SQL' . $e->getMessage());
    }
}

function add_user($sql, $acc, $pwd, $name, $email, $file)
{
    $conn = pdo_connect();
    $stmt = $conn->prepare($sql);
    $stmt->execute();
}

function edit_user($acc, $pwd, $name, $email, $target, $id ,$roles)
{
    $conn = pdo_connect();
    if ($target != '') {
        $sql = "UPDATE user SET account = '$acc', passwd = '$pwd', name = '$name', email = '$email', avatar = '$target', roles ='$roles' WHERE id_user = '$id'";
    } else {
        $sql = "UPDATE user SET account = '$acc', passwd = '$pwd', name = '$name', email = '$email', roles = '$roles' WHERE id_user = '$id'";
    }
    $stmt = $conn->prepare($sql);
    $stmt->execute();
}

function addComment($idsp, $iduser, $content, $date)
{
    $conn = pdo_connect();
    $sql = "INSERT INTO binh_luan (id_sp, id_user, noi_dung, thoi_gian) VALUES('$idsp', '$iduser', '$content', '$date')";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
}

function showComment($id)
{
    try {
        $conn = pdo_connect();
        $sql = "SELECT * FROM binh_luan WHERE id_sp = $id";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt->fetchAll();
    } catch (Exception $e) {
        die('loi ket noi sql' . $e->getMessage());
    }

}

function user_comment($iduser)
{
    $conn = pdo_connect();
    $sql = "SELECT * FROM user WHERE id_user = '$iduser'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    return $stmt->fetch();
}

function detail_cmt($sql, $id, $id_sp)
{
    $conn = pdo_connect();
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    return $stmt->fetchAll();
}

function select_fetch_3($sql, $id, $id_sp)
{
    $conn = pdo_connect();
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    return $stmt->fetch();
}

function view_product($id)
{
    $conn = pdo_connect();
    $stmt = $conn->prepare("UPDATE san_pham SET luot_xem = luot_xem + 1 WHERE id_sp = '$id'");
    $stmt->execute();
}

function search_key($sql, $value_search)
{
    $conn = pdo_connect();
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    return $stmt->fetchAll();
}

function select_product_sidebar($sql)
{
    $conn = pdo_connect();
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    return $stmt->fetchAll();
}


?>