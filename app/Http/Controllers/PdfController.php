<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use TCPDF; // TCPDFのファサードを使用するために追加
use App\Http\Requests\PdfGenerateRequest;
// modelのUserを使う処理
use App\Models\Tweet;
use App\Models\User;
use Auth;

class PdfController extends Controller
{
    public function showPdfForm()
    {
        return view('test.pdfTest');
    }
    
    public function generatePDF(PdfGenerateRequest $request)
    {

       $data = [
            'name_sei' => $request->input('name_sei'),
            'name_mei' => $request->input('name_mei'),
            'address' => $request->input('address'),
            'school_name' => $request->input('school_name'),
            'company_name' => $request->input('company_name'),
            'preferred_datetime_1' => $request->input('preferred_datetime_1'),
            'preferred_datetime_2' => $request->input('preferred_datetime_2'),
            'preferred_datetime_3' => $request->input('preferred_datetime_3'),
            'preferred_class_format' => $request->input('preferred_class_format'),
            
             'db_tweet' => $request->input('db_tweet'),
             'db_description' => $request->input('db_description'),
        ];

        $pdf = new TCPDF();
        $pdf->AddPage();
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);
        $pdf->SetAutoPageBreak(false);
        $pdf->SetMargins(10, 10, 0);
        $pdf->SetFont('kozminproregular', '', 12);
        
        // void SetTitle(string $title){
        //     $title->$pdf->("テスト");
        
        // $pdf->Cell(幅, 高さ, 出力する文字列, (bool)セルの枠線の有無, セルを作った後のXY座標定義, 揃え, (bool)セルの塗りつぶし, リンク先URL);
        $pdf->Cell(190, 15, "申し込み書", 1, 0, "L", 1, " ", 0, false);
        
        $title = "申　込　申　請　書";
        
        $pdf->SetTitle($title);
        
        $pdf->SetXY(100, 50);
        $pdf->Write(5, "\n");
        
        $pdf->SetXY(100, 50);
        $pdf->Write(5, "姓: {$data['name_sei']}\n");
        $pdf->Write(5, "名: {$data['name_mei']}\n");
        $pdf->Write(5, "住所: {$data['address']}\n");
        $pdf->Write(5, "学校名: {$data['school_name']}\n");
        $pdf->Write(5, "申し込みたい企業名: {$data['company_name']}\n");
        $pdf->Write(5, "希望日時1: {$data['preferred_datetime_1']}\n");
        $pdf->Write(5, "希望日時2: {$data['preferred_datetime_2']}\n");
        $pdf->Write(5, "希望日時3: {$data['preferred_datetime_3']}\n");
        $pdf->Write(5, "希望の授業形式: {$data['preferred_class_format']}\n");
        
        $pdf->Text(10,25, "ツイートの内容: {$data['db_tweet']}\n");
        $pdf->Write(20, "説明: {$data['db_description']}\n");
        
        $pdf->Ellipse(10, 10, 10, 10);
        // // DBから取得する　Tweetから取得
            // $tweet = Tweet::find($id)
            // $DatabaseTweet = $tweet->tweet;
            // $DatabaseDes = $tweet->description;
    
            // $pdf->Write(5, "ツイート内容: {$DatabaseTweet}\n");
            // $pdf->Write(5, "ユーザーの説明: {$DatabaseDes}\n");

            
 
            $pdf->Output('detail.pdf', 'I');
        }
}
