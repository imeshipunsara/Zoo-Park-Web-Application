<?php


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {

        require_once './models/CommunityMember.php';
        require_once './my_exception.php';

        $community_member = new CommunityMember();

        if (
            !isset($_POST['first_name']) ||
            !isset($_POST['last_name']) ||
            !isset($_POST['contact_number']) ||
            !isset($_POST['email']) ||
            !isset($_POST['password'])
        ) {
            throw new MyException("All fields are required");
        }
        $community_member->set_first_name($_POST['first_name']);
        $community_member->set_last_name($_POST['last_name']);
        $community_member->set_contact_number($_POST['contact_number']);
        $community_member->set_email($_POST['email']);
        $community_member->set_password($_POST['password']);
        $community_member->set_gender($_POST['gender']);
        $community_member->set_age($_POST['age']);

        $community_member->register();

        echo 'success';
    } catch (MyException $e) {
        echo $e->getMessage();
    }
}
?>