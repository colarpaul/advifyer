<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        .clearfix:after {
            content: "";
            display: table;
            clear: both;
        }

        a {
            color: #5D6975;
            text-decoration: underline;
        }

        body {
            position: relative;
            width: 100%;
            height: 29.7cm;
            margin: 0 auto;
            color: #001028;
            background: #FFFFFF;
            font-family: Arial, sans-serif;
            font-size: 12px;
            font-family: Arial;
        }

        header {
            padding: 10px 0;
            margin-bottom: 30px;
        }

        #logo {
            text-align: center;
            margin-bottom: 10px;
        }

        #logo img {
            width: 90px;
        }

        h1 {
            border-top: 1px solid  #5D6975;
            border-bottom: 1px solid  #5D6975;
            color: #5D6975;
            font-size: 2.4em;
            line-height: 1.4em;
            font-weight: normal;
            text-align: center;
            margin: 0 0 20px 0;
{{--            background: url({{asset('images/payments/dimension.png')}});--}}
        }

        #project {
            float: left;
        }

        #project span {
            padding-top:3px;
            color: #5D6975;
            text-align: right;
            width: 52px;
            margin-right: 10px;
            display: inline-block;
            font-size: 0.8em;
        }

        #company {
            float: right;
            text-align: left;
        }

        #project div,
        #company div {
            white-space: nowrap;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            border-spacing: 0;
            margin-bottom: 20px;
        }

        table tr:nth-child(2n-1) td {
            background: #F5F5F5;
        }

        table th,
        table td {
            text-align: center;
        }

        table th {
            padding: 5px 20px;
            color: #5D6975;
            border-bottom: 1px solid #C1CED9;
            white-space: nowrap;
            font-weight: normal;
        }

        table .service,
        table .desc {
            text-align: left;
        }

        table td {
            padding: 20px;
            text-align: right;
        }

        table td.service,
        table td.desc {
            vertical-align: top;
        }

        table td.unit,
        table td.qty,
        table td.total {
            text-align: left;
        }

        table td.grand {
            border-top: 1px solid #5D6975;;
        }

        #notices .notice {
            color: #5D6975;
            font-size: 1.2em;
        }

        footer {
            color: #5D6975;
            width: 100%;
            height: 30px;
            position: absolute;
            bottom: 0;
            border-top: 1px solid #C1CED9;
            padding: 8px 0;
            text-align: center;
        }
    </style>
    <meta charset="utf-8">
    <title>Example 1</title>
    <link rel="stylesheet" href="style.css" media="all" />
</head>
<body>
<header class="clearfix">
    <div id="logo">
        <img src="http://fs5.directupload.net/images/170403/e5gp9hy5.jpg">
    </div>
    <h1>INVOICE</h1>
    <div id="company" class="clearfix">
        <div>Advifyer</div>
        <div>666 Wow Street</div>
        <div>+49 (0) 15252602794</div>
        <div><a href="mailto:hello@advifyer.com">hello@advifyer.com</a></div>
    </div>
    <div id="project">
        <div><span>PROJECT</span> Advifyer</div>
        <div><span>CLIENT</span> {{ $user->first_name . ' ' . $user->last_name }}</div>
        <div><span>EMAIL</span> {{ $user->email }}</div>
    </div>
</header>
<main>
    <table>
        <thead>
        <tr>
            <th class="desc">ACQUISITION DATE</th>
            <th class="service">SERVICE</th>
            <th class="desc">CODES</th>
            <th class="desc">TOTAL</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td class="total">{{ $payment->created_at->format('d M Y') }}</td>
            <td class="service">Package {{ $package->name }}</td>
            <td class="desc">{{ $package->max_codes }}</td>
            <td class="unit">{{ number_format($package->price) }} €</td>
        </tr>
        <tr>
            <td colspan="3">TAX 25%</td>
            <td class="total">{{ number_format(25/100*$package->price) }} €</td>
        </tr>
        <tr>
            <td colspan="3" class="grand total">GRAND TOTAL</td>
            <td class="grand total">{{  number_format(25/100*$package->price + $package->price) }} €</td>
        </tr>
        </tbody>
    </table>
    {{--<div id="notices">--}}
        {{--<div>NOTICE:</div>--}}
        {{--<div class="notice">A finance charge of 1.5% will be made on unpaid balances after 30 days.</div>--}}
    {{--</div>--}}
</main>
<footer>
    COMPANY INFO
</footer>
</body>
</html>