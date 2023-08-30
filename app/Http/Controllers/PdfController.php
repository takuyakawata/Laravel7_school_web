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
        ];

        $pdf = new TCPDF();
        $pdf->SetFont('kozminproregular', '', 12);
        $pdf->AddPage();

        $pdf->Write(5, "姓: {$data['name_sei']}\n");
        $pdf->Write(5, "名: {$data['name_mei']}\n");
        $pdf->Write(5, "住所: {$data['address']}\n");
        $pdf->Write(5, "学校名: {$data['school_name']}\n");
        $pdf->Write(5, "申し込みたい企業名: {$data['company_name']}\n");
        $pdf->Write(5, "希望日時1: {$data['preferred_datetime_1']}\n");
        $pdf->Write(5, "希望日時2: {$data['preferred_datetime_2']}\n");
        $pdf->Write(5, "希望日時3: {$data['preferred_datetime_3']}\n");
        $pdf->Write(5, "希望の授業形式: {$data['preferred_class_format']}\n");
        
        
        // // DBから取得する　Tweetから取得
        $tweet = Tweet::find($id)
        
        
            $DatabaseTweet = $tweet->tweet;
            $DatabaseDes = $tweet->description;
    
            $pdf->Write(5, "ツイート内容: {$DatabaseTweet}\n");
            $pdf->Write(5, "ユーザーの説明: {$DatabaseDes}\n");
    
            $pdf->Output('detail.pdf', 'I');
        
        }
}
