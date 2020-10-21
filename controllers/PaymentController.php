<?php
// nhúng các file tương ứng
require_once 'configs/PHPMailer/src/PHPMailer.php';
require_once 'configs/PHPMailer/src/SMTP.php';
require_once 'configs/PHPMailer/src/Exception.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require_once 'controllers/Controller.php';
require_once 'models/Orders.php';
require_once 'models/OrderDetail.php';
class PaymentController extends Controller {
  public function index() {
      if (isset($_POST['submit'])){
          $fullname = $_POST['fullname'];
          $address = $_POST['address'];
          $mobile = $_POST['mobile'];
          $email = $_POST['email'];
          $note = $_POST['note'];
          $method = $_POST['method'];
          if (empty($fullname)||empty($address)||empty($mobile)||empty($email)){
              $this->error = "Full Name hoặc address hoặc email hoặc mobile không được để trống";
          }
          elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)){
              $this->error = "Email không đúng định dạng";
          }
          // xử lý lưu thông tin đơn hàng chỉ khi không có lỗi xảy ra
          if (empty($this->error)){
              // lưu thông tin đơn hàng vào bảng orders trec

              $model_model = new Orders();
              // gán các giá trị đơn hàng cho thuộc tính của mođel
              if (isset($_SESSION['user'])){
                  $model_model->user_id = $_SESSION['user']['id'];
              }
              else $model_model->user_id = '';
              $model_model->fullname = $fullname;
              $model_model->address = $address;
              $model_model->mobile = $mobile;
              $model_model->email = $email;
              $model_model->note = $note;
              // xử lý tro trường payment_status: trạng thái thanh toán đơn hàng, mặc định khi mới đặt hàng là: 0
              // bên backend sẽ cần có chứ năng update lại trạng thái thanh toán
              $model_model->payment_status = 0;
              // Xử lý cho trường price_total: tổng giá trị đơn hàng bằng cách lặp mảng giỏ hàng, cộng dồn thành tiền
              $price_total = 0;
              foreach ($_SESSION['cart'] as $product_id => $cart){
                  $price_total += $cart['price'] * $cart['quantity'];
              }
              if (isset($_SESSION['discount'])){
                  $price_total = $price_total - ($_SESSION['discount']['discount_num']/ 100 * $price_total);
              }
              $model_model->price_total = $price_total;
              // bình thường khi insert vào bảng thì sẽ trả về boolean, tuy nhiên với trường hợp này sẽ câcf trả về id của chính
              // đơn hàng vừa insert, vì còn phải lưu vàng bảng order_detail
              $order_id = $model_model->insert();
              //+ sau bước trên lấy được order_id, tiếp theo sẽ lưu tiếp vào ảng order_detail - bảng này mo tả đơn hàng
              // có các sản phẩm nào và các số lượng tương ứng là bao nhiêu
              $model_detail = new OrderDetail();
              // lặp giỏ hàng để lưu các thông tin về product_id và quantity vào bảng orders_detail
              foreach ($_SESSION['cart'] as $product_id => $cart){
                  $model_detail->order_id = $order_id;
                  $model_detail->product_id = $product_id;
                  $model_detail->quantity = $cart['quantity'];
                  $model_detail->insert();
              }
              // gửi mail cho khách hàng
              // viết thành 1 phương thức gửi mail riêng
              // gửi mail
              // nội dung khi gửi mail chính là thôgn tin người mua hàng và thông tin đơn hàng
//              $body = "...";
//              $this->sendmail($email, $body);
              // kiểm tra phương thức thanh toán user muốn là gì, dựa vào key=method
              // nếu là thanh toán truọc tuyến thì chuyển hướng về trang ngân lượng
              if ($method == 0){
                  // tạo 1 mảng thông tin thánh toán để dành cho việc hiển thị tại trạng ngân lượng
                  $_SESSION['payment_info'] = [
                      'price_total' => $price_total,
                      'fullname' => $fullname,
                      'email' => $email,
                      'mobile' => $mobile
                  ];
                  header('location: index.php?controller=payment&action=online');
                  exit();
              }
              else{
                  $_SESSION['payment_info'] = [
                      'price_total' => $price_total,
                      'fullname' => $fullname,
                      'email' => $email,
                      'mobile' => $mobile,
                      'address' => $address
                  ];
                  // nếu thanh toán COD chuyển hướng về 1 trang cảm ơn
                  header('location: index.php?controller=payment&action=thank');
                  exit();
              }
          }
      }
    //Lấy nội dung view payment
    $this->content =
        $this->render('views/payments/index.php');
    //Gọi layout để hiển thị nội dung view vừa lấy đc
    require_once 'views/layouts/home_main.php';
  }
  // phương thức gửi mail
  public function sendmail($email, $body){
      // Import PHPMailer classes into the global namespace
// Load Composer's autoloader
//      require 'vendor/autoload.php';
      $mail = new PHPMailer(true);

      try {
          //Server settings
//          $mail->SMTPDebug = NONE;                      // Enable verbose debug output
          $mail->isSMTP();                                            // Send using SMTP
          $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
          $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
          $mail->Username   = 'mguyenminh99@gmail.com';                     // SMTP username
          $mail->Password   = 'vytrpbbrnqblxpfq';                               // SMTP password
          $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
          $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

          //Recipients
          $mail->setFrom('mguyenminh99@gmail.com', 'Mailer');
          $mail->addAddress($email);               // Name is optional
//          $mail->addReplyTo('info@example.com', 'Information');
//          $mail->addCC('cc@example.com');
//          $mail->addBCC('bcc@example.com');

          // Attachments
//          $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//          $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

          // Content
          $mail->isHTML(true);                                  // Set email format to HTML
          $mail->Subject = 'Here is the subject';
          $mail->Body    = $body;
          $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

          $mail->send();
//          echo 'Message has been sent';
      } catch (Exception $e) {
          echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
      }
  }
  // hiển thị trang thanh toán ngân lượng
    public function online(){
      $this->content = $this->render('configs/nganluong/index.php');
      echo $this->content;
    }
    public function thank(){
      $email = $_SESSION['payment_info']['email'];
      $body = $this->render('views/payments/mail_template_order.php');
      $this->sendmail($email, $body);
      unset($_SESSION['cart']);
      unset($_SESSION['discount']);
      $this->content = $this->render('views/payments/thank.php');
      require_once 'views/layouts/home_main.php';
    }
}