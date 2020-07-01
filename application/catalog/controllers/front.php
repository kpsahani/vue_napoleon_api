<?php


class Front extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     *      http://example.com/index.php/dashboard
     *  - or -  
     *      http://example.com/index.php/dashboard/index
     *  - or -
     * Since this controller is set as the default controller in 
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/dashboard/<method_name>
     * @see http://codeigniter.com/user_guide/general/urls.html
     */
    public
            $data;

    public
            function __construct()
    {
        parent::__construct();
        // Your own constructor code
       
        //include('include.php');
        //Setting Page Title and Comman Variable
        $this->data['title'] = ' Home';
        $this->data['section_title'] = 'front';
        // $this->data['site_name'] = $this->settings->get_setting_value();
        //$this->data['site_url'] = $this->settings->get_setting_value(2);

        //Load leftsidemenu and save in variable

        //$this->data['topmenu'] = $this->load->view('topmenu', $this->data, true);
        //$this->data['leftmenu'] = $this->load->view('leftmenu', $this->data, true);
        //Load header and save in variable
        $this->data['header'] = $this->load->view('header', $this->data, true);
        $this->data['footer'] = $this->load->view('footer', $this->data, true);
        $this->data['home'] = $this->load->view('home', $this->data, true);
        $this->load->library('form_validation');
        // $this->load->library('upload');
        $this->load->model('common');
    }

    public function index()
    {
        $this->load->view('index',$this->data);
    }
    public function insert(){
        if(isset($_POST['submit']))
        {
            $data = array(
                            'v_firstname' =>$_POST['v_firstname'] ,
                            'v_lastname'=>$_POST['v_lastname'],
                            'i_phonenumber'=>$_POST['i_phonenumber'],
                            'v_email'=>$_POST['v_email'],
                        );
            $this->common->insert_data($data, 'lead');
        }
    }

    public function paytm(){
        $this->load->view('donate');
    }

     
    public function paytmpost()
    {
        header("Pragma: no-cache");
        header("Cache-Control: no-cache");
        header("Expires: 0");
        // following files need to be included
        require_once(APPPATH ."/third_party/paytmlib/config_paytm.php");
        require_once(APPPATH ."/third_party/paytmlib/encdec_paytm.php");

        $checkSum = "";
        $paramList = array();

            
        $ORDER_ID = $_POST["ORDER_ID"];
        $CUST_ID = $_POST["CUST_ID"];
        $INDUSTRY_TYPE_ID = $_POST["INDUSTRY_TYPE_ID"];
        $CHANNEL_ID = $_POST["CHANNEL_ID"];
        $TXN_AMOUNT = $_POST["TXN_AMOUNT"];
        $MSISDN = $_POST["customer_phone"];
        $EMAIL = $_POST["customer_email"];
        // Create an array having all required parameters for creating checksum.
        $paramList["MID"] = PAYTM_MERCHANT_MID;
        $paramList["ORDER_ID"] = $ORDER_ID;
        $paramList["CUST_ID"] = $CUST_ID;
        $paramList["INDUSTRY_TYPE_ID"] = $INDUSTRY_TYPE_ID;
        $paramList["CHANNEL_ID"] = $CHANNEL_ID;
        $paramList["TXN_AMOUNT"] = $TXN_AMOUNT;
        $paramList["WEBSITE"] = PAYTM_MERCHANT_WEBSITE;
        $paramList["CALLBACK_URL"] = "http://localhost/napoleon/front/paytmsuccess";
        $paramList["MSISDN"] = $MSISDN; //Mobile number of customer
        $paramList["EMAIL"] = $EMAIL; //Email ID of customer
        $paramList["PAYMENT_MODE_ONLY"] = "YES";
        /*
        $paramList["CALLBACK_URL"] = "http://localhost/PaytmKit/pgResponse.php";
        $paramList["MSISDN"] = $MSISDN; //Mobile number of customer
        $paramList["EMAIL"] = $EMAIL; //Email ID of customer
        $paramList["VERIFIED_BY"] = "EMAIL"; //
        $paramList["IS_USER_VERIFIED"] = "YES"; //

        */

        //Here checksum string will return by getChecksumFromArray() function.
        $checkSum = getChecksumFromArray($paramList,PAYTM_MERCHANT_KEY);

        echo "<html>
        <head>
        <title>Merchant Check Out Page</title>
        </head>
        <body>
            <center><h1>Please do not refresh this page...</h1></center>
                <form method='post' action='".PAYTM_TXN_URL."' name='f1'>
        <table border='1'>
         <tbody>";
     
         foreach($paramList as $name => $value) {
         echo '<input type="hidden" name="' . $name .'" value="' . $value .         '">';
         }
     
         echo "<input type='hidden' name='CHECKSUMHASH' value='". $checkSum . "'>
         </tbody>
        </table>
        <script type='text/javascript'>
         document.f1.submit();
        </script>
        </form>
        </body>
        </html>";

  }

  public function paytmsuccess()
  {
    // print_r($_POST);die;

        if ($_POST['STATUS'] == 'TXN_SUCCESS' )
        {

            $data = array(
                'ORDER_ID' =>$_POST['ORDERID'] ,
				'TXNID'=>$_POST['TXNID'],
				'TXN_AMOUNT'=>$_POST['TXNAMOUNT'],
				'PAYMENT_MODE'=>$_POST['PAYMENTMODE'],
				'CURRENCY'=>$_POST['CURRENCY'],
				'TXN_DATE'=>$_POST['TXNDATE'],
				'STATUS'=>$_POST['STATUS'],
                'GATEWAY_NAME'=>$_POST['GATEWAYNAME'],
                'BANK_TXNID'=>$_POST['BANKTXNID'],
				'BANKNAME'=>$_POST['BANKNAME'],
				'CHECKSUMHASH'=>$_POST['CHECKSUMHASH'],
				
			);
            
            if ($this->common->insert_data($data, 'paytm'))
            {
            
                $this->session->set_flashdata('success', 'User inserted successfully.');
                // redirect('paytmsuccess', 'refresh');
                $this->load->view('paytmsuccess',$data);
            }
            else
            {
                $log->warn("Error while inserting record.");
                $this->session->set_flashdata('message', 'Something went wrong. Please try again.');
                $this->load->view('paytmsuccess');
            }

        }

  }
}