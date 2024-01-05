<?php

require_once 'dbconfig.php';

class MYORDERS
{
    private $conn;
    public function __construct()
    {
        $database = new Database();
        $db = $database->dbConnection();
        $this->conn = $db;
    }

    public function runQuery($sql)
    {
        $stmt = $this->conn->prepare($sql);
        return $stmt;
    }

    public function lasdID()
    {
        $stmt = $this->conn->lastInsertId();
        return $stmt;
    }
    public function razorPayOnline($fname, $razorpayOrderId, $razorpayPaymentId, $address, $apartment, $city, $zip, $phone, $email, $deliveryType, $deliveryDate, $deliveryTime, $store, $order_id, $otp, $paymentStatus, $paymentType)
    {
        try {
            // Prepare the query
            $stmt2 = $this->conn->prepare("SELECT COUNT(order_id) AS order_count FROM orders WHERE order_id = :order_id AND razorpayPaymentId = :razorpayPaymentId");
            // Bind the parameters
            $stmt2->bindParam(':order_id', $order_id, PDO::PARAM_STR);
            $stmt2->bindParam(':razorpayPaymentId', $razorpayPaymentId, PDO::PARAM_STR);
            // Execute the query
            $stmt2->execute();
            // Fetch the result
            $result = $stmt2->fetch(PDO::FETCH_ASSOC);
            // Get the count of orders
            $order_count = $result['order_count'];

            if ($order_count > 0) {
                // Update existing order
                $stmt3 = $this->conn->prepare("UPDATE orders SET razorpayPaymentId=:razorpayPaymentId, paymentStatus=:paymentStatus WHERE email=:email AND order_id=:order_id");
                $stmt3->bindParam(":email", $email);
                $stmt3->bindParam(":razorpayPaymentId", $razorpayPaymentId);
                $stmt3->bindParam(":paymentStatus", $paymentStatus);
                $stmt3->bindParam(":order_id", $order_id);
                $stmt3->execute();
                // $_SESSION['ORDER_ID'] = $order_id;
                $_SESSION['otp'] = $otp;
                return $stmt3;
            } else {
                // Insert new order
                $stmt = $this->conn->prepare("INSERT INTO orders(user_id,name, razorpayOrderId, razorpayPaymentId, address, appartment, city, postcode, phone, email, delieverytype, delievery_date, delievery_time, store, order_id, otp, paymentstatus, payment_type) 
            VALUES(:user_id,:fname_o, :razorpayOrderId_o, :razorpayPaymentId_o, :address_o, :apartment_o, :city_o, :zip_o, :phone_o, :email_o, :deliveryType_o, :deliveryDate_o, :deliveryTime_o, :store_o, :order_id_o, :otp_o, :paymentStatus_o, :paymentType_o)");

                // Bind parameters for the new order
                $stmt->bindParam(":user_id", $_SESSION['ATECHFOOD_USER_ID']);
                $stmt->bindParam(":fname_o", $fname);
                $stmt->bindParam(":razorpayOrderId_o", $razorpayOrderId);
                $stmt->bindParam(":razorpayPaymentId_o", $razorpayPaymentId);
                $stmt->bindParam(":address_o", $address);
                $stmt->bindParam(":apartment_o", $apartment);
                $stmt->bindParam(":city_o", $city);
                $stmt->bindParam(":zip_o", $zip);
                $stmt->bindParam(":phone_o", $phone);
                $stmt->bindParam(":email_o", $email);
                $stmt->bindParam(":deliveryType_o", $deliveryType);
                $stmt->bindParam(":deliveryDate_o", $deliveryDate);
                $stmt->bindParam(":deliveryTime_o", $deliveryTime);
                $stmt->bindParam(":store_o", $store);
                $stmt->bindParam(":order_id_o", $order_id);
                $stmt->bindParam(":otp_o", $otp);
                $stmt->bindParam(":paymentStatus_o", $paymentStatus);
                $stmt->bindParam(":paymentType_o", $paymentType);
                $stmt->execute();
                $last_order_id = $this->conn->lastInsertId();

                // Process cart items
                $cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : array();
                foreach ($cart as $item) {
                    $item_name = $item['dish_name'];
                    $sku = $item['sku'];
                    $price = $item['price'];
                    $dishID = $item['dishID'];
                    $qty = $item['quantity'];
                    $option = $item['attributeID'];
                    $plan = $item['tiffin'];
                    if (empty($option)) {
                        $option = '';
                    }
                    if (empty($plan)) {
                        $plan = '';
                    }
                    $sql2 = "INSERT INTO order_details (invoice_order_id, name, sku, price, qty, order_id, attributeID, plan,dish_order_id) VALUES (:order_id, :item_name, :sku, :price, :qty, :last_order_id, :options, :plan, :dishID)";
                    $stmt2 = $this->conn->prepare($sql2);
                    $stmt2->bindParam(':order_id', $order_id);
                    $stmt2->bindParam(':item_name', $item_name);
                    $stmt2->bindParam(':sku', $sku);
                    $stmt2->bindParam(':price', $price);
                    $stmt2->bindParam(':qty', $qty);
                    $stmt2->bindParam(':last_order_id', $last_order_id);
                    $stmt2->bindParam(':options', $option);
                    $stmt2->bindParam(':plan', $plan);
                    $stmt2->bindParam(':dishID', $dishID);
                    $stmt2->execute();
                }

                // $_SESSION['ORDER_ID'] = $order_id;
                $_SESSION['otp'] = $otp;
                return $stmt2;
            }
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }

    public function updatePayStatus($email, $razorpayOrderId, $razorpayPaymentId, $paymentStatus)
    {
        try {
            $stmt = $this->conn->prepare("UPDATE orders SET razorpayPaymentId=:razorpayPaymentId, paymentStatus=:paymentStatus WHERE email=:email AND razorpayOrderId=:razorpayOrderId");
            $stmt->bindParam(":email", $email);
            $stmt->bindParam(":razorpayPaymentId", $razorpayPaymentId);
            $stmt->bindParam(":paymentStatus", $paymentStatus);
            $stmt->bindParam(":razorpayOrderId", $razorpayOrderId);
            $stmt->execute();
            return $stmt;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }
}
