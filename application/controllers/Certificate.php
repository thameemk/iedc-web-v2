<?php
defined('BASEPATH') or exit('No direct script access allowed');
include('./application/libraries/Classes/TCPDF/tcpdf.php');

class ZNW_PDFAA extends TCPDF
{

    public function Header()
    {

        // Quelle: http://www.tcpdf.org/examples/example_051.phps
        // get the current page break margin
        $bMargin = $this->getBreakMargin();
        // get current auto-page-break mode
        $auto_page_break = $this->AutoPageBreak;
        // disable auto-page-break
        $this->SetAutoPageBreak(false, 0);
        // set background image
        $img_file = 'assets/uploads/cert/'.$this->certFile;
        $this->Image($img_file, 0, 0,  297, 210, '', '', '', false, 300, '', false, false, 0);
        // restore auto-page-break status
        $this->SetAutoPageBreak($auto_page_break, $bMargin);
        // set the starting point for the page content
        $this->setPageMark();
    }

    // Page footer
    public function Footer()
    {

        // no special footer

    }
}


class Certificate extends CI_Controller
{

    public function download_merit_cert()
    {

        $eventid = $this->security->xss_clean($this->input->post('event_id'));      
        require_once('./application/libraries/Classes/TCPDF/tcpdf.php');

        $this->load->model('user_model');
        if (isset($_SESSION['email'])) {
        } else {
            return;
        }
        $records = $this->user_model->get_event_reg_data($eventid, $_SESSION['email']);
        if (!$records) {
            echo "norec";
            return;
        }

        $pdf = new ZNW_PDFAA(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

        $pdf->certFile = $records->cert_file_1;

        // set document information
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('IEDC TKMCE');
        $pdf->SetTitle('Certificate of Appreciation');
        $pdf->SetSubject('Certificate');
        $pdf->SetKeywords('IEDC TKMCE Appreciation Certificate');


        $pdf->SetLeftMargin(100);
        $pdf->SetTopMargin(80);
        $pdf->SetProtection(array('modify'));

        $style = array(
            'border' => 1,
            'padding' => 'auto',
            'fgcolor' =>  array(0, 0, 0),
            'bgcolor' => array(255, 255, 255)
        );


        $pdf->AddPage('L');
        $pdf->SetXY(0, 89);
        $html1 = "";
        $fullname = '<h1 style="font-size:2.5em"><b>'.$records->fullname.'</b></h1>';
        $htmlcollege = '<h1 style="font-size:2em"><b>'.$records->college.'</b></h1>';
        $certno = "<h3>No : $records->cert_num</h3>";
        $position = "";
        switch ($records->is_attended) {
            case "101":
                $position = "First";
                break;
            case "102":
                $position = "Second";
                break;
            default:
                return;
        }
        $poshtml = '<h1 style="font-size:2em"><b>'.$position.'</b></h1>';
        $pdf->writeHTMLCell(380, 10, $records->cert_file_1_name_x, $records->cert_file_1_name_y, $fullname, 0, 1, 0, true, '', true);
        $pdf->writeHTMLCell(380, 10, $records->cert_file_1_college_x, $records->cert_file_1_college_y, $htmlcollege, 0, 1, 0, true, '', true);  
        $pdf->writeHTMLCell(380, 10, $records->cert_file_1_merit_x, $records->cert_file_1_merit_y, $poshtml, 0, 1, 0, true, '', true);
        $pdf->writeHTMLCell(300, 10, 224, 25, $certno, 0, 1, 0, true, '', true);

        $pdf->Output($records->cert_num.'.pdf', 'D');
    }

    public function download_default_cert()
    {

        $eventid = $this->security->xss_clean($this->input->post('event_id'));      
        require_once('./application/libraries/Classes/TCPDF/tcpdf.php');

        $this->load->model('user_model');
        if (isset($_SESSION['email'])) {
        } else {
            return;
        }
        $records = $this->user_model->get_event_reg_data($eventid, $_SESSION['email']);
        if (!$records) {
            echo "norec";
            return;
        }

        $pdf = new ZNW_PDFAA(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

        $pdf->certFile = $records->cert_file_1;

        // set document information
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('IEDC TKMCE');
        $pdf->SetTitle('Certificate of Participation');
        $pdf->SetSubject('Certificate');
        $pdf->SetKeywords('IEDC TKMCE Participation Certificate');


        $pdf->SetLeftMargin(100);
        $pdf->SetTopMargin(80);
        $pdf->SetProtection(array('modify'));

        $style = array(
            'border' => 1,
            'padding' => 'auto',
            'fgcolor' =>  array(0, 0, 0),
            'bgcolor' => array(255, 255, 255)
        );


        $pdf->AddPage('L');
        $pdf->SetXY(0, 89);
        $html1 = "";
        $fullname = '<h1 style="font-size:2.5em"><b>'.$records->fullname.'</b></h1>';
        $htmlcollege = '<h1 style="font-size:2em"><b>'.$records->college.'</b></h1>';
        $certno = "<h3>No : $records->cert_num</h3>";               
        $pdf->writeHTMLCell(380, 10, $records->cert_file_0_name_x, $records->cert_file_0_name_y, $fullname, 0, 1, 0, true, '', true);
        $pdf->writeHTMLCell(380, 10, $records->cert_file_0_college_x, $records->cert_file_0_college_y, $htmlcollege, 0, 1, 0, true, '', true);       
        $pdf->writeHTMLCell(300, 10, 224, 25, $certno, 0, 1, 0, true, '', true);

        $pdf->Output($records->cert_num.'.pdf', 'D');
    }
}
