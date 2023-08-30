<!-- resources/views/test/pdfTest.blade.php -->
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>フォーム</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

<div class="container mx-auto p-4">
    <form action="{{ route('generate-pdf') }}" method="post" class="bg-white shadow-md rounded-lg p-6">
        {{-- CSRFトークン --}}
        {{ csrf_field() }}
        <table class="w-full">
            <tbody>
                <tr>
                    <td class="fs-5 py-2">姓</td>
                    <td><input class="w-full py-2 px-4 border rounded-lg" type="text" maxlength="15" name="name_sei" placeholder=""></td>
                </tr>
                <tr>
                    <td class="fs-5 py-2">名</td>
                    <td><input class="w-full py-2 px-4 border rounded-lg" type="text" maxlength="15" name="name_mei" placeholder=""></td>
                </tr>
                <tr>
                    <td class="fs-5 py-2">住所</td>
                    <td><input class="w-full py-2 px-4 border rounded-lg" type="text" name="address" placeholder=""></td>
                </tr>
                <tr>
                    <td class="fs-5 py-2">学校名</td>
                    <td><input class="w-full py-2 px-4 border rounded-lg" type="text" name="school_name" placeholder=""></td>
                </tr>
                <tr>
                    <td class="fs-5 py-2">申し込みたい企業名</td>
                    <td><input class="w-full py-2 px-4 border rounded-lg" type="text" name="company_name" placeholder=""></td>
                </tr>
                 <tr>
                    <td class="fs-5 py-2">希望日時1</td>
                    <td>
                        <input class="w-full py-2 px-4 border rounded-lg" type="date" name="preferred_datetime_1" placeholder="">
                    </td>
                </tr>
                <tr>
                    <td class="fs-5 py-2">希望日時2</td>
                    <td>
                        <input class="w-full py-2 px-4 border rounded-lg" type="date" name="preferred_datetime_2" placeholder="">
                    </td>
                </tr>
                <tr>
                    <td class="fs-5 py-2">希望日時3</td>
                    <td>
                        <input class="w-full py-2 px-4 border rounded-lg" type="date" name="preferred_datetime_3" placeholder="">
                    </td>
                </tr>
                <tr>
                    <td class="fs-5 py-2">希望の授業形式</td>
                    <td>
                        <select name="preferred_class_format" class="w-full py-2 px-4 border rounded-lg">
                            <option value="オンライン">オンライン</option>
                            <option value="対面">対面</option>
                            <option value="どちらでも">どちらでも</option>
                        </select>
                    </td>
                </tr>
                <!----------------------------------------------->
                <!--DBからの値の表示と送信-->
                <!----------------------------------------------->
                <tr>
                    <td class="fs-5 py-2">tweet</td>
                    <td>
                        <p class="w-full py-2 px-4 border rounded-lg" type="text" name="preferred_datetime_3" placeholder=""><p>
                    </td>
                </tr>
                <tr>
                    <td class="fs-5 py-2">文章</td>
                    <td>
                        <p class="w-full py-2 px-4 border rounded-lg" type="text" name="preferred_datetime_3" placeholder=""><p>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" class="text-center py-4">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            OK
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
    </form>
<!--ーーーーーーーーーーーーーーーーーーーーーーーーーー-->

</body>
</html>