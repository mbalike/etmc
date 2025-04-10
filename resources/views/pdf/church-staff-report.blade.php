<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubungo ETMC Staff Report</title>
    <style>
        @page {
            margin: 1cm;
        }
        
        body {
            font-family: 'DejaVu Sans', Arial, sans-serif;
            line-height: 1.4;
            color: #333;
            position: relative;
            margin: 0;
            padding: 0;
            font-size: 10pt;
        }
        
        /* Background Logo */
        .bg-logo {
            position: fixed;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            z-index: -1;
            opacity: 0.08; /* Faded background logo */
            text-align: center;
        }
        
        .bg-logo img {
            height: 80%;
            margin-top: 10%;
        }
        
        /* Header */
        .header {
            position: relative;
            border-bottom: 2px solid #003366;
            padding-bottom: 12px;
            margin-bottom: 15px;
            height: 80px;
        }
        
        .church-name {
            color: #003366;
            font-size: 18px;
            font-weight: bold;
            width: 60%;
            position: absolute;
            top: 15px;
            left: 80px;
        }
        
        .logo {
            position: absolute;
            top: 5px;
            left: 0;
            height: 50px;
        }
        
        .contact-info {
            position: absolute;
            top: 10px;
            right: 0;
            text-align: right;
            font-size: 9pt;
            width: 40%;
        }
        
        /* Main Content */
        .main-content {
            margin-bottom: 60px; /* Space for footer */
        }
        
        /* Section Headings */
        h2 {
            color: #003366;
            border-bottom: 1px solid #003366;
            padding-bottom: 3px;
            margin-top: 20px;
            font-size: 14pt;
        }
        
        h3 {
            color: #004080;
            margin-top: 15px;
            page-break-after: avoid;
            font-size: 12pt;
        }
        
        /* Report Metadata */
        .report-metadata {
            background-color: #f8f9fa;
            border: 1px solid #ddd;
            padding: 8px 12px;
            margin: 10px 0 15px 0;
            border-radius: 4px;
            font-size: 9pt;
        }
        
        .report-metadata p {
            margin: 3px 0;
        }
        
        /* Tables */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 15px;
            page-break-inside: auto;
            font-size: 9pt;
        }
        
        tr {
            page-break-inside: avoid;
            page-break-after: auto;
        }
        
        th {
            background-color: #e6f0ff;
            color: #003366;
            padding: 6px;
            text-align: left;
            border-bottom: 1px solid #003366;
            font-size: 9pt;
        }
        
        td {
            padding: 5px 6px;
            border-bottom: 1px solid #ddd;
        }
        
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        
        /* Role Intro */
        .role-intro {
            font-size: 9pt;
            margin-bottom: 8px;
            text-align: justify;
        }
        
        .role-count {
            color: #004080;
            font-weight: bold;
            font-size: 11pt;
            margin-top: 5px;
            margin-bottom: 5px;
        }
        
        /* Footer */
        .footer {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            height: 50px;
            border-top: 1px solid #ddd;
            padding-top: 8px;
            font-size: 8pt;
            color: #666;
            text-align: center;
            background-color: white;
        }
        
        .page-number {
            position: absolute;
            bottom: 8px;
            right: 10px;
            font-size: 8pt;
        }
        
        .generator-info {
            position: absolute;
            bottom: 8px;
            left: 10px;
            font-size: 8pt;
        }
        
        ul {
            padding-left: 20px;
            margin: 8px 0;
        }
        
        li {
            margin-bottom: 3px;
        }
        
        p {
            text-align: justify;
            margin: 6px 0;
        }
    </style>
</head>
<body>
    <!-- Background Logo -->
    <div class="bg-logo">
        <img src="{{ asset('assets/img/ETMClogo.png') }}" alt="Watermark Logo">
    </div>

    <!-- Header -->
    <div class="header">
        <img src="{{ asset('assets/img/ETMClogo.png') }}" alt="Ubungo ETMC Logo" class="logo">
        <div class="church-name">UBUNGO END TIME MESSAGE CHURCH</div>
        <div class="contact-info">
            <strong>Phone:</strong> +255 123 456 789<br>
            <strong>Email:</strong> office@ubungoetmc.org<br>
            <strong>Address:</strong> Ubungo, Dar Es Salaam, Tanzania
        </div>
    </div>
    
    <<div class="main-content">
    <!-- Report Title -->
    <h2 style="text-align: center;">ORODHA YA WATUMISHI WA KANISA</h2>
    
    <!-- Report Metadata -->
    <div class="report-metadata">
        <p><strong>Nambari ya Ripoti:</strong> ETMC-STAFF-{{ date('Ymd') }}-{{ rand(1000, 9999) }}</p>
        <p><strong>Imetolewa tarehe:</strong> {{ $generatedDate }} saa {{ now()->format('H:i') }}</p>
        <p><strong>Mwonekano wa Ripoti:</strong> Orodha kamili ya watumishi hadi tarehe ya sasa</p>
        <p><strong>Jumla ya watumishi:</strong> {{ $totalUsers }} katika majukumu {{ count($roleDistribution) }} tofauti</p>
    </div>
    
    <!-- Introduction -->
    <h3>UTANGULIZI</h3>
    <p>
        Ripoti hii inaangazia kwa kina watumishi wote wanaohudumu katika Kanisa la Ubungo End Time Message Church (ETMC).
        Orodha hii imepangwa kulingana na majukumu ya huduma, ikiwa na taarifa mahsusi kwa kila mtumishi kama vile mawasiliano na majukumu yao.
        Hati hii ni kumbukumbu rasmi ya rasilimali watu na muundo wa huduma za kanisa hadi tarehe {{ $generatedDate }}.
    </p>
    <p>
        Watumishi wa ETMC wanawakilisha kundi lenye utofauti wa vipaji na huduma, wakijitolea kutimiza maono ya kanisa kupitia huduma mbalimbali na kazi za kiutawala. 
        Orodha hii inalenga kurahisisha mawasiliano na ushirikiano bora baina ya uongozi wa kanisa na waumini.
    </p>
    
    <!-- Role Distribution -->
    <h3 MGAWANYO WA MAJUKUMU</h3>
    <p>Muundo wa huduma wa kanisa la ETMC unajumuisha watu {{ $totalUsers }} waliogawanyika katika majukumu ya huduma na utawala {{ count($roleDistribution) }}:</p>
    <ul>
        @foreach($roleData as $roleId => $data)
            <li>
                <strong>{{ $data['name'] }}:</strong> watumishi {{ $data['count'] }}
                @if($roleId == 3) {{-- Deacons --}}
                    (kwa pamoja wakisimamia waumini {{ $totalSupervisedMembers }})
                @endif
            </li>
        @endforeach
    </ul>
    
    <!-- Role Sections -->
    @foreach($roleData as $roleId => $role)
        <h3>{{ strtoupper($role['name']) }} ({{ $role['count'] }})</h3>
        
        <!-- Role-specific introductions -->
        <div class="role-intro">
            @if($roleId == 2) {{-- Pastoral Team --}}
                Timu ya wachungaji hutumika kama viongozi wa kiroho wa kanisa. Wanahubiri, kuongoza ibada, kutoa ushauri wa kiroho, na kufanya ibada maalum kama vile ndoa, mazishi, na ubatizo. Pia wanawafundisha waumini na kuwaongoza katika ukuaji wa kiroho.
            @elseif($roleId == 3) {{-- Deacons --}}
                Mashemasi wa ETMC huhudumu kama walezi wa kiroho na wasaidizi wa waumini. Kila shemasi anasimamia kundi maalum la waumini, akihakikisha wanapata mahitaji ya kiroho, msaada wa kila siku, na ufuatiliaji wa karibu. Kwa pamoja, mashemasi wetu wanawahudumia waumini wapatao {{ $totalSupervisedMembers }}.
            @elseif($roleId == 4) {{-- Trustees --}}
                Walezi wa mali ya kanisa (Trustees) husimamia mali zote za kanisa kama majengo, vifaa, na fedha. Wanahakikisha sheria na taratibu za kifedha zinafuatwa, pamoja na kudhibiti matengenezo na matumizi ya mali za kanisa.
            @elseif($roleId == 5) {{-- Evangelists --}}
                Wainjilisti wetu wanajikita katika kuwafikia watu nje ya kanisa kwa kuhubiri Injili. Wanaratibu mikutano ya injili, kutoa mafunzo ya uinjilisti kwa waumini, na kushiriki katika shughuli za huduma kwa jamii.
            @elseif($roleId == 6) {{-- Musicians --}}
                Huduma ya muziki ina mchango mkubwa katika ibada. Wanamuziki wetu wana vipaji mbalimbali na wanatumia vipaji hivyo kuongoza sifa na kuabudu, wakitengeneza mazingira ya kiibada yaliyojaa heshima na uwepo wa Mungu.
            @elseif($roleId == 7) {{-- Librarians --}}
                Maktaba ya kanisa inasimamiwa na wakutubi ambao wanahifadhi vitabu, nyaraka, na kumbukumbu muhimu za kihistoria za kanisa. Wanasaidia waumini kupata maarifa, kusajili vitabu, na kuhakikisha taarifa ziko salama na zinazopatikana kwa urahisi.
            @elseif($roleId == 8) {{-- Technicians --}}
                Wataalamu wa vifaa vya kiufundi wanahakikisha kuwa vifaa vya sauti, taa, na mitambo mingine ya kanisa vinafanya kazi ipasavyo. Wanasaidia kuboresha mawasiliano na uzoefu wa ibada kwa kutumia teknolojia ya kisasa.
            @elseif($roleId == 9) {{-- Security --}}
                Kikosi cha ulinzi wa kanisa kinahakikisha usalama wa waumini na mali ya kanisa wakati wa ibada na shughuli nyingine zote. Wanadhibiti milango, kusaidia waumini kuingia kwa utaratibu, na kuhakikisha shughuli zote zinafanyika kwa amani na utulivu.
        
            @endif
        </div>
        
        @if($role['count'] > 0)
          @if($roleId != 1)
            <table>
                <thead>
                    <tr>
                        <th>Jina</th>
                        @if($roleId == 3)
                            <th>Waumini Anaowasimamia</th>
                        @endif
                        @if($roleId == 6)
                            <th>Umaalumu</th>
                        @endif
                        <th>Barua Pepe</th>
                        <th>Namba ya Simu</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($role['users'] as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            @if($roleId == 3)
                                <td>{{ $user->supervisedCount }}</td>
                            @endif
                            @if($roleId == 6)
                                <td>{{ $user->specification }}</td>
                            @endif
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->phone }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @endif
        @else
            <p>Hakuna watumishi waliopangiwa jukumu hili kwa sasa.</p>
        @endif
        
        @if($roleId == 3 && $role['count'] > 0)
            <p class="role-intro">
                Kumbuka: Kila shemasi aliyeorodheshwa hapo juu anawajibika kufuatilia kwa karibu kundi la waumini alilopewa, kutoa msaada wa kiroho, sala, na kushughulikia mahitaji yao.
            </p>
        @endif

        @if($roleId == 6 && $role['count'] > 0)
            <p class="role-intro">
                Huduma ya muziki inajumuisha vipaji mbalimbali vinavyosaidia kutoa uzoefu mzuri wa kuabudu. Kila mwanamuziki anahudumu kulingana na kipawa chake, akiendesha ibada za kawaida na hafla maalum.
            </p>
        @endif
    @endforeach

    <!-- Conclusion -->
    <h3>HITIMISHO</h3>
    <p>
        Orodha hii ya watumishi wa ETMC ni muhtasari wa jumla wa timu tofauti zinazohudumu katika kanisa letu. 
        Taarifa hizi zinalenga matumizi ya ndani ya kanisa ili kusaidia katika mawasiliano, uratibu, na utekelezaji bora wa huduma.
        Kwa marekebisho au masasisho, tafadhali wasiliana na ofisi ya utawala ya kanisa.
    </p>
</div>

<!-- Footer -->
<div class="footer">
    <div>Orodha ya Watumishi wa Kanisa la Ubungo End Time Message | Imetolewa tarehe {{ $generatedDate }}</div>
    <div class="generator-info">Imetolewa na: {{ auth()->user()->name }} ({{ auth()->user()->role->name ?? 'Mtumishi' }})</div>
    <div class="page-number">Ukurasa {PAGENO} kati ya {nb}</div>
</div>

    <script type="text/php">
        if (isset($pdf)) {
            $text = "Page {PAGE_NUM} of {PAGE_COUNT}";
            $font = $fontMetrics->get_font("DejaVu Sans", "normal");
            $size = 8;
            $color = array(0,0,0);
            $width = $fontMetrics->get_text_width($text, $font, $size);
            $x = $pdf->get_width() - $width - 15;
            $y = $pdf->get_height() - 15;
            $pdf->page_text($x, $y, $text, $font, $size, $color);
        }
    </script>
</body>
</html>