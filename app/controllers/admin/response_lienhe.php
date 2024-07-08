<?php
    require_once 'phpmailer/Exception.php';
    require_once 'phpmailer/PHPMailer.php';
    require_once 'phpmailer/SMTP.php';
    
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
class response_lienhe extends Controller
{
    private $data, $model;

    function __construct()
    {
        $this->model = $this->model('Database');
    }

    function index() {

        if(!isPost()) {
            $filterAll = filter();
            if(!empty($filterAll) && isset($filterAll)) {
                $id = $filterAll['id'];
                $data = $this->model->select([], 'lien_he', "WHERE id = '$id'")[0];
                // echo '<pre>';   
                // print_r($data);
                // echo '</pre>';
                $this->view('admin/layout', [
                    'page' => 'admin/response_lienhe',
                    'data' => $data
                ]);
            }
        } else {
            $filterAll = filter();

            // Hàm gửi mail
            function sendMail($email, $subject, $content) {

                //Create an instance; passing `true` enables exceptions
                $mail = new PHPMailer(true);
            
                try {
        
                    //Server settings
                    $mail->SMTPDebug = SMTP::DEBUG_OFF;                      //Enable verbose debug output
                    $mail->isSMTP();                                            //Send using SMTP
                    $mail->Host = 'smtp.gmail.com';                     //Set the SMTP server to send through
                    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                    $mail->Username   = 'shynke20004@gmail.com';                     //SMTP username
                    $mail->Password   = 'wnvq nnqo nbom qcci ';                               //SMTP password
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
            
                    //Recipients
                    $mail->setFrom('hoanganh52521352@gmail.com', 'hoangganh');
                    $mail->addAddress($email);     //Add a recipient
            
                    
            
                    //Content
                    $mail-> CharSet = "UTF-8";
                    $mail->isHTML(true);                                  //Set email format to HTML
                    $mail->Subject = "Gửi đên khách hàng ".$subject;
                    $mail->Body    = $content;
            
                    // phpMailer certificate verify failed
               
            
                    $sendMail = $mail->send();
                    echo 'Gửi thành công!';
                    
                } catch (Exception $e) {
                    echo "Gửi mail thất bài. Mailer Error: {$mail->ErrorInfo}";
                }
            }
          
           
            $check = sendMail($filterAll['gmail'], $filterAll['tenkhachhang'], $filterAll['noidung']);
            redirect('admin/lien_he');
        }

    }
}
?>