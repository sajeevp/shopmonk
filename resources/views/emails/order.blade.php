<!DOCTYPE html>
<html>

<head>
    <title>ShopMonk.com</title>
</head>

<body>
    <div
        style="font-family:Verdana,Arial;font-weight:normal;margin:0;padding:0;text-align:left;color:#333333;background-color:#ebebeb;background:#ebebeb;font-size:12px">
        <table id="m_-313285397904595317background-table"
            style="border-collapse:collapse;padding:0;margin:0 auto;background-color:#ebebeb;font-size:12px"
            width="100%" cellspacing="0" cellpadding="0" border="0">
            <tbody>
                <tr>
                    <td style="font-family:Verdana,Arial;font-weight:normal;border-collapse:collapse;vertical-align:top;padding:0;margin:0;width:100%"
                        valign="top" align="center">
                        <table style="border-collapse:collapse;padding:0;margin:0 auto;width:600px" cellspacing="0"
                            cellpadding="0" border="0" align="center">
                            <tbody>
                                <tr>
                                    <td style="background:#000;font-family:Verdana,Arial;font-weight:normal;border-collapse:collapse;vertical-align:top;padding:0;margin:0"
                                        align="center">
                                        <table style="border-collapse:collapse;padding:0;margin:0;width: 100%;" cellspacing="0"
                                            cellpadding="0" border="0">
                                            <tbody>
                                                <tr>
                                                    <td style="font-family:Verdana,Arial;font-weight:normal;border-collapse:collapse;vertical-align:top;padding:15px 0px 10px 5px;margin:0"
                                                        align="center">
                                                        <a style="color:#3696c2;display:block"
                                                            target="_blank"
                                                            data-saferedirecturl="https://www.google.com/url?q=https://www.freshtohome.com/&amp;source=gmail&amp;ust=1668791948382000&amp;usg=AOvVaw0KHvWAq7l_y_AXJD9p_hZ5"
                                                            href="https://www.dubmonk.com/">
                                                            <img alt="freshtohome.com"
                                                                style="outline:none;text-decoration:none" class="CToWUd"
                                                                data-bit="iit"
                                                                src="https://www.dubmonk.com/wp-content/uploads/elementor/thumbs/dub_logo_4-pw5vn8go23p386yoi6rp2wnbdrftmhnh9lloa41v5s.png"
                                                                width="" height="" border="0"></a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="background:#fff;font-family:Verdana,Arial;font-weight:normal;border-collapse:collapse;vertical-align:top;padding:0;margin:0"
                                        valign="top">
                                        <table style="border-collapse:collapse;padding:0;margin:0" cellspacing="0"
                                            cellpadding="0" border="0">
                                            <tbody>
                                                <tr>
                                                    <td
                                                        style="font-family:Verdana,Arial;font-weight:normal;border-collapse:collapse;vertical-align:top;padding:0;margin:0">
                                                        <table style="border-collapse:collapse;padding:0;margin:0"
                                                            width="100%" cellspacing="0" cellpadding="0"
                                                            border="0">
                                                            <tbody>
                                                                <tr>
                                                                    <td
                                                                        style="font-family:Verdana,Arial;font-weight:normal;border-collapse:collapse;vertical-align:top;padding:0 1%;margin:0;background:#e1f0f8;text-align:center;width:100%">
                                                                        <h1
                                                                            style="font-family:Verdana,Arial;font-weight:700;font-size:16px;margin:1em 0;line-height:20px;text-transform:uppercase">
                                                                            THANK YOU FOR YOUR ORDER ON ShopMonk.COM.
                                                                        </h1>
                                                                    </td>
                                                                </tr>
                                                                <tr></tr>

                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        style="font-family:Verdana,Arial;font-weight:normal;border-collapse:collapse;vertical-align:top;padding:5px 15px;margin:0;text-align:center">
                                                        <h3
                                                            style="font-family:Verdana,Arial;font-weight:normal;font-size:17px;margin-bottom:10px;margin-top:15px">
                                                            Your order <span>#{{ $mailData->id }}</span>
                                                        </h3>
                                                        <p
                                                            style="font-family:Verdana,Arial;font-weight:normal;font-size:11px;margin:1em 0 15px">
                                                            Placed on :
                                                            {{ date('d-m-Y', strtotime($mailData->created_at)) }}
                                                        </p>

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        style="font-family:Verdana,Arial;font-weight:normal;border-collapse:collapse;vertical-align:top;padding:0;margin:0">
                                                        <table
                                                            style="border:1px solid #eaeaea;border-collapse:collapse;padding:0;margin:0;width:100%"
                                                            width="650" cellspacing="0" cellpadding="0"
                                                            border="0">
                                                            <thead>
                                                                <tr>
                                                                    <th style="font-size:13px;padding:3px 9px;font-family:Verdana,Arial;font-weight:normal"
                                                                        bgcolor="#EAEAEA" align="left">
                                                                        Item
                                                                    </th>

                                                                    <th style="font-size:13px;padding:3px 9px;font-family:Verdana,Arial;font-weight:normal"
                                                                        bgcolor="#EAEAEA" align="center">
                                                                        Price & Qty
                                                                    </th>
                                                                    <th style="font-size:13px;padding:3px 9px;font-family:Verdana,Arial;font-weight:normal"
                                                                        bgcolor="#EAEAEA" align="right">
                                                                        Subtotal
                                                                    </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($mailData->orderitems as $item)
                                                                    <tr>
                                                                        <td style="font-size:11px;padding:3px 9px;border-bottom:1px dotted #cccccc;font-family:Verdana,Arial;font-weight:normal;border-collapse:collapse;vertical-align:top;margin:0"
                                                                            valign="top" align="left">
                                                                            <strong
                                                                                style="font-size:11px;font-family:Verdana,Arial;font-weight:normal">{{ $item->itemProduct->name }}</strong>
                                                                        </td>

                                                                        <td style="font-size:11px;padding:3px 9px;border-bottom:1px dotted #cccccc;font-family:Verdana,Arial;font-weight:normal;border-collapse:collapse;vertical-align:top;margin:0"
                                                                            valign="top" align="center">
                                                                            INR {{ $item['price'] }} x
                                                                            {{ $item['quantity'] }}
                                                                        </td>
                                                                        <td style="font-size:11px;padding:3px 9px;border-bottom:1px dotted #cccccc;font-family:Verdana,Arial;font-weight:normal;border-collapse:collapse;vertical-align:top;margin:0"
                                                                            valign="top" align="right">
                                                                            <span
                                                                                style="font-family:&quot;Helvetica Neue&quot;,Verdana,Arial,sans-serif">INR
                                                                                {{ $item['price'] * $item['quantity'] }}</span>
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                                <tr>
                                                                    <td style="padding:3px 9px;font-family:Verdana,Arial;font-weight:normal;border-collapse:collapse;vertical-align:top;margin:0"
                                                                        colspan="2" align="right">
                                                                        Subtotal
                                                                    </td>
                                                                    <td style="padding:3px 9px;font-family:Verdana,Arial;font-weight:normal;border-collapse:collapse;vertical-align:top;margin:0"
                                                                        align="right">
                                                                        <span
                                                                            style="font-family:&quot;Helvetica Neue&quot;,Verdana,Arial,sans-serif">INR
                                                                            {{ $mailData->sub_total }}</span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="padding:3px 9px;font-family:Verdana,Arial;font-weight:normal;border-collapse:collapse;vertical-align:top;margin:0"
                                                                        colspan="2" align="right">
                                                                        <strong
                                                                            style="font-family:Verdana,Arial;font-weight:normal">Grand
                                                                            Total</strong>
                                                                    </td>
                                                                    <td style="padding:3px 9px;font-family:Verdana,Arial;font-weight:normal;border-collapse:collapse;vertical-align:top;margin:0"
                                                                        align="right">
                                                                        <strong
                                                                            style="font-family:Verdana,Arial;font-weight:normal"><span
                                                                                style="font-family:&quot;Helvetica Neue&quot;,Verdana,Arial,sans-serif">INR
                                                                                {{ $mailData->total }}</span></strong>
                                                                    </td>
                                                                </tr>


                                                            </tbody>
                                                        </table>
                                                        <table
                                                            style="border-collapse:collapse;padding:0;margin:0;width:100%"
                                                            cellspacing="0" cellpadding="0" border="0">
                                                            <tbody>
                                                                <tr>
                                                                    <td
                                                                        style="font-family:Verdana,Arial;font-weight:normal;border-collapse:collapse;vertical-align:top;padding:10px 15px 0;margin:0;padding-top:10px;text-align:left">
                                                                        <h6
                                                                            style="font-family:Verdana,Arial;font-weight:700;font-size:12px;margin-bottom:0px;margin-top:5px;text-transform:uppercase">
                                                                            Bill to:
                                                                        </h6>
                                                                        <p
                                                                            style="font-family:Verdana,Arial;font-weight:normal;font-size:12px;line-height:18px;margin-bottom:15px;margin-top:2px">
                                                                            <span>{{ $mailData->name }}<br>
                                                                                {{ $mailData->address_1 }}<br>
                                                                                {{ $mailData->address_2 }}<br>
                                                                                {{ $mailData->state }},
                                                                                {{ $mailData->country }},
                                                                                {{ $mailData->postcode }}<br>
                                                                                T: {{ $mailData->phone }}</span>
                                                                        </p>
                                                                    </td>
                                                                    <td
                                                                        style="font-family:Verdana,Arial;font-weight:normal;border-collapse:collapse;vertical-align:top;padding:10px 15px 0;margin:0;padding-top:10px;text-align:left">
                                                                        <h6
                                                                            style="font-family:Verdana,Arial;font-weight:700;font-size:12px;margin-bottom:0px;margin-top:5px;text-transform:uppercase">
                                                                            Ship to:
                                                                        </h6>
                                                                        <p
                                                                            style="font-family:Verdana,Arial;font-weight:normal;font-size:12px;line-height:18px;margin-bottom:15px;margin-top:2px">
                                                                            <span>{{ $mailData->name }}<br>
                                                                                {{ $mailData->address_1 }}<br>
                                                                                {{ $mailData->address_2 }}<br>
                                                                                {{ $mailData->state }},
                                                                                {{ $mailData->country }},
                                                                                {{ $mailData->postcode }}<br>
                                                                                T: {{ $mailData->phone }}</span>
                                                                        </p>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td
                                                                        style="font-family:Verdana,Arial;font-weight:normal;border-collapse:collapse;vertical-align:top;padding:10px 15px 0;margin:0;text-align:left;padding-bottom:10px">
                                                                        <h6
                                                                            style="font-family:Verdana,Arial;font-weight:700;text-align:left;font-size:12px;margin-bottom:0px;margin-top:5px;text-transform:uppercase">
                                                                            Payment id:
                                                                        </h6>
                                                                        <p
                                                                            style="font-family:Verdana,Arial;font-weight:normal;text-align:left;font-size:12px;margin-top:2px;margin-bottom:30px;line-height:18px;padding:0">
                                                                            {{ $mailData->payment_method }}
                                                                        </p>
                                                                    </td>
                                                                    <td
                                                                        style="font-family:Verdana,Arial;font-weight:normal;border-collapse:collapse;vertical-align:top;padding:10px 15px 0;margin:0;text-align:left;padding-bottom:10px">
                                                                        <h6
                                                                            style="font-family:Verdana,Arial;font-weight:700;text-align:left;font-size:12px;margin-bottom:0px;margin-top:5px;text-transform:uppercase">
                                                                            Payment method:
                                                                        </h6>
                                                                        <p
                                                                            style="font-family:Verdana,Arial;font-weight:normal;text-align:left;font-size:12px;margin-top:2px;margin-bottom:30px;line-height:18px;padding:0">
                                                                            <strong
                                                                                style="font-family:Verdana,Arial;font-weight:normal;text-align:left">{{ $mailData->payment_method }}</strong>
                                                                        </p>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <p
                            style="font-size:20px;font-family:Verdana,Arial;font-weight:normal;text-align:center;line-height:32px;margin-bottom:75px;margin-top:30px">
                            Thank you, Team ShopMonk.COM
                        </p>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</body>

</html>
