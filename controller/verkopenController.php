<?php
class verkopenController extends Controller {

    function index() {

        if(isset($_POST['submit'])) {
            if (!empty($_FILES)) {
                if(isset($_FILES['afbeelding'])){
                    print_R($_FILES);
                    $afbeeldingCount = count($_FILES['afbeelding']['name']);
                    $errors = array();
                    if($afbeeldingCount <= 8) {
                        for ($i = 0; $i < $afbeeldingCount; $i++) {
                            $file_name = $_FILES['afbeelding']['name'][$i];
                            $exploded_file_name = explode('.', $file_name);
                            $exploded_file_name = end($exploded_file_name);
                            $file_size = $_FILES['afbeelding']['size'][$i];
                            $file_tmp = $_FILES['afbeelding']['tmp_name'][$i];
                            $file_type = $_FILES['afbeelding']['type'][$i];
                            $file_ext = strtolower($exploded_file_name);

                            $extensions = array("jpeg", "jpg", "png");

                            if (in_array($file_ext, $extensions) === false) {
                                $errors[] = "extension not allowed, please choose a JPEG or PNG file.";
                            }

                            if ($file_size > 2097152) {
                                $errors[] = 'File size must be excately 2 MB';
                            }

                            if (empty($errors) == true) {
                                move_uploaded_file($file_tmp, PATH . "/assets/images/" . $file_name);
                            } else {
                                print_r($errors);
                            }
                        }
                    } else {
                        //error te veel afbeeldingein
                    }




                }

            }
        }

        $data['title'] = "Eenmaal Andermaal - verkopen";
        $data['page'] = "gebruikerVerkopen";
        $this->set($data);
        $this->load_view("template");
    }
}
?>