<!-- church-annual-report.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubungo ETMC Annual Report</title>
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
        
        /* Statistics Box */
        .stats-box {
        background-color: #f0f7ff;
        border: 1px solid #b8d4f5;
        border-radius: 5px;
        padding: 15px;
        margin: 12px 0;
    }
    
    .stats-flex {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
    }
    
    .stats-item {
        width: 24%;
        text-align: center;
        margin-bottom: 5px;
    }
    
    .stats-figure {
        font-size: 16pt;
        font-weight: bold;
        color: #003366;
        margin: 0;
    }
    
    .stats-label {
        font-size: 9pt;
        color: #444;
        margin: 3px 0 0 0;
    }

        /* Charts */
        .chart-container {
            height: 200px;
            width: 100%;
            margin: 15px 0;
            text-align: center;
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

        .report-table {
        width: 100%;
        border-collapse: separate;
        border-spacing: 10px;
        text-align: center;
    }

    .report-cell {
        background-color: #f9fbff;
        border: 1px solid #e1e8f0;
        border-radius: 12px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
        padding: 20px;
        transition: transform 0.2s ease-in-out;
    }

    .report-cell:hover {
        transform: scale(1.02);
    }

    .stat-number {
        font-size: 22pt;
        font-weight: bold;
        color: #1e3a8a; /* blue-900 */
        margin-bottom: 6px;
    }

    .stat-label {
        font-size: 12pt;
        color: #475569; /* slate-600 */
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
    
    <div class="main-content">
        <!-- Report Title -->
        <h2 style="text-align: center;">RIPOTI YA MWAKA {{ $reportYear }}</h2>
        
        <!-- Report Metadata -->
        <div class="report-metadata">
            <p><strong>Nambari ya Ripoti:</strong> ETMC-ANN-{{ $reportYear }}-{{ rand(1000, 9999) }}</p>
            <p><strong>Imetolewa tarehe:</strong> {{ $generatedDate }}</p>
            <p><strong>Kipindi:</strong> Januari 1, {{ $reportYear }} hadi Desemba 31, {{ $reportYear }}</p>
            <p><strong>Imetolewa na:</strong> {{ auth()->user()->name }} ({{ auth()->user()->role->name ?? 'Mtumishi' }})</p>
        </div>
        
        <!-- Introduction -->
        <h3>UTANGULIZI</h3>
        <p>
            Ripoti hii ya mwaka inatoa muhtasari wa shughuli za kanisa la Ubungo End Time Message Church (ETMC) kwa mwaka {{ $reportYear }}.
            Inaangazia idadi ya waumini, ubatizo, ndoa, vifo, uhamisho, na matukio muhimu yaliyofanyika katika mwaka huu.
            Ripoti hii ni kumbukumbu rasmi ya ukuaji na changamoto za kanisa katika kipindi hiki.
        </p>
        
        <!-- Overall Church Statistics -->
        <h3>TAKWIMU ZA JUMLA ZA KANISA</h3>
        
        <table class="report-table">
    <tr>
        <td class="report-cell">
            <div class="stat-number">{{ $totalMemberCount }}</div>
            <div class="stat-label">Idadi ya Waumini Wote</div>
        </td>
        <td class="report-cell">
            <div class="stat-number">{{ $adultMemberCount }}</div>
            <div class="stat-label">Waumini Wazima</div>
        </td>
        <td class="report-cell">
            <div class="stat-number">{{ $teenagersCount }}</div>
            <div class="stat-label">Vijana</div>
        </td>
        <td class="report-cell">
            <div class="stat-number">{{ $childrenCount }}</div>
            <div class="stat-label">Watoto</div>
        </td>
    </tr>
    <tr>
        <td class="report-cell">
            <div class="stat-number">{{ $familiesCount }}</div>
            <div class="stat-label">Familia</div>
        </td>
        <td class="report-cell">
            <div class="stat-number">{{ $marriagesCount }}</div>
            <div class="stat-label">Ndoa za Mwaka</div>
        </td>
        <td class="report-cell">
            <div class="stat-number">{{ $baptismsCount }}</div>
            <div class="stat-label">Ubatizo wa Mwaka</div>
        </td>
        <td class="report-cell">
            <div class="stat-number">{{ $eventsCount }}</div>
            <div class="stat-label">Matukio ya Mwaka</div>
        </td>
    </tr>
</table>
        
        <!-- Membership Details -->
        <h3>WAUMINI WA KANISA</h3>
        <p>
            Kanisa la ETMC lina jumla ya watu {{ $totalMemberCount }} ambao ni waumini wazima, vijana, na watoto. 
            Hapa chini ni muhtasari wa takwimu za waumini:
        </p>
        
        <table>
            <thead>
                <tr>
                    <th>Aina</th>
                    <th>Wanaume</th>
                    <th>Wanawake</th>
                    <th>Jumla</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Waumini Wazima</td>
                    <td>{{ $maleMemberCount }}</td>
                    <td>{{ $femaleMemberCount }}</td>
                    <td>{{ $adultMemberCount }}</td>
                </tr>
                <tr>
                    <td>Vijana (13-17)</td>
                    <td>{{ $maleTeenCount }}</td>
                    <td>{{ $femaleTeenCount }}</td>
                    <td>{{ $teenagersCount }}</td>
                </tr>
                <tr>
                    <td>Watoto (0-12)</td>
                    <td>{{ $maleChildCount }}</td>
                    <td>{{ $femaleChildCount }}</td>
                    <td>{{ $childrenCount }}</td>
                </tr>
                <tr>
                    <td><strong>Jumla</strong></td>
                    <td><strong>{{ $totalMaleCount }}</strong></td>
                    <td><strong>{{ $totalFemaleCount }}</strong></td>
                    <td><strong>{{ $totalMemberCount }}</strong></td>
                </tr>
            </tbody>
        </table>
        
        <!-- Hali ya Ndoa -->
        <p>Hali ya Ndoa ya Waumini Wazima:</p>
        <table>
            <thead>
                <tr>
                    <th>Hali ya Ndoa</th>
                    <th>Wanaume</th>
                    <th>Wanawake</th>
                    <th>Jumla</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Waliooa/Olewa</td>
                    <td>{{ $marriedMaleCount }}</td>
                    <td>{{ $marriedFemaleCount }}</td>
                    <td>{{ $marriedMaleCount + $marriedFemaleCount }}</td>
                </tr>
                <tr>
                    <td>Waseja</td>
                    <td>{{ $singleMaleCount }}</td>
                    <td>{{ $singleFemaleCount }}</td>
                    <td>{{ $singleMaleCount + $singleFemaleCount }}</td>
                </tr>
                <tr>
                    <td>Wajane</td>
                    <td>{{ $widowerCount }}</td>
                    <td>{{ $widowCount }}</td>
                    <td>{{ $widowerCount + $widowCount }}</td>
                </tr>
                <tr>
                    <td>Watalaka</td>
                    <td>{{ $divorcedMaleCount }}</td>
                    <td>{{ $divorcedFemaleCount }}</td>
                    <td>{{ $divorcedMaleCount + $divorcedFemaleCount }}</td>
                </tr>
            </tbody>
        </table>
        
        <!-- Familia -->
        <h3>FAMILIA</h3>
        <p>
            Kanisa la ETMC lina jumla ya familia {{ $familiesCount }}. Kila familia inajumuisha wanafamilia kadhaa 
            ambao hushiriki katika shughuli za kanisa. Familia hizi huwakilisha msingi muhimu wa jumuiya yetu ya kanisa.
        </p>
        
        <!-- UBATIZO -->
        <h3>UBATIZO WA MWAKA {{ $reportYear }}</h3>
        <p>
            Katika mwaka {{ $reportYear }}, kanisa la ETMC limebatiza waumini {{ $baptismsCount }}. 
            Ubatizo umekuwa ukifanyika kila mara baada ya kutolewa kwa mafunzo ya ubatizo kwa waumini wapya.
        </p>
        
        <table>
            <thead>
                <tr>
                    <th>Tarehe</th>
                    <th>Jina la Mbatizwa</th>
                    <th>Amebatizwa na</th>
                </tr>
            </thead>
            <tbody>
                @forelse($baptisms as $baptism)
                <tr>
                    <td>{{ $baptism->baptism_date->format('d/m/Y') }}</td>
                    <td>{{ $baptism->member->first_name }} {{ $baptism->member->last_name }}</td>
                    <td>{{ $baptism->baptised_by }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="3">Hakuna ubatizo uliofanyika mwaka huu.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
        
        <!-- NDOA -->
        <h3>NDOA ZA MWAKA {{ $reportYear }}</h3>
        <p>
            Kanisa letu limeshuhudia ndoa {{ $marriagesCount }} katika mwaka {{ $reportYear }}. 
            Ndoa hizi zimefungwa na viongozi wa kanisa na zinajumuisha wanachama wa kanisa letu.
        </p>
        
        <table>
            <thead>
                <tr>
                    <th>Tarehe</th>
                    <th>Bwana Harusi</th>
                    <th>Bibi Harusi</th>
                    <th>Msimamizi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($marriages as $marriage)
                <tr>
                    <td>{{ $marriage->marriage_date->format('d/m/Y') }}</td>
                    <td>{{ $marriage->husband->first_name }} {{ $marriage->husband->last_name }}</td>
                    <td>{{ $marriage->wife->first_name }} {{ $marriage->wife->last_name }}</td>
                    <td>{{ $marriage->wed_by }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="4">Hakuna ndoa zilizofanyika mwaka huu.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
        
        <!-- VIFO -->
        <h3>VIFO VYA MWAKA {{ $reportYear }}</h3>
        <p>
            Kwa masikitiko, kanisa letu limepoteza waumini {{ $deathsCount }} katika mwaka {{ $reportYear }}. 
            Tunaendelea kuomba kwa ajili ya familia zao na kuwakumbuka katika sala zetu.
        </p>
        
        <table>
            <thead>
                <tr>
                    <th>Jina</th>
                    <th>Tarehe ya Kifo</th>
                </tr>
            </thead>
            <tbody>
                @forelse($deaths as $death)
                <tr>
                    <td>{{ $death->full_name }}</td>
                    <td>{{ $death->date_of_death->format('d/m/Y') }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="2">Hakuna vifo vilivyoripotiwa mwaka huu.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
        
        <!-- UHAMISHO -->
        <h3>UHAMISHO WA MWAKA {{ $reportYear }}</h3>
        <p>
            Kanisa letu limeona uhamisho wa waumini {{ $transfersCount }} katika mwaka {{ $reportYear }}. 
            Uhamisho huu unajumuisha waumini waliokuja kutoka kanisa lingine au walioondoka kwenda kanisa lingine.
        </p>
        
        <table>
            <thead>
                <tr>
                    <th>Jina</th>
                    <th>Aina</th>
                    <th>Sababu</th>
                    <th>Tarehe</th>
                </tr>
            </thead>
            <tbody>
                @forelse($transfers as $transfer)
                <tr>
                    <td>{{ $transfer->full_name }}</td>
                    <td>{{ $transfer->reason == 'Joining' ? 'Kujiunga' : 'Kuondoka' }}</td>
                    <td>{{ $transfer->description }}</td>
                    <td>{{ $transfer->transfer_date->format('d/m/Y') }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="4">Hakuna uhamisho uliofanyika mwaka huu.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
        
        <!-- MATUKIO -->
        <h3>MATUKIO YA MWAKA {{ $reportYear }}</h3>
        <p>
            Mwaka {{ $reportYear }} umekuwa na matukio {{ $eventsCount }} muhimu kwa kanisa letu. 
            Matukio haya yamejumuisha mikutano, semina, maadhimisho, na hafla mbalimbali za kikanisa.
        </p>
        
        <table>
            <thead>
                <tr>
                    <th>Tarehe</th>
                    <th>Jina la Tukio</th>
                    <th>Mahali</th>
                </tr>
            </thead>
            <tbody>
                @forelse($events as $event)
                <tr>
                <td>{{ \Carbon\Carbon::parse($event->event_date)->format('d/m/Y') }}</td>
                <td>{{ $event->title }}</td>
                <td>{{ $event->location }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="3">Hakuna matukio yaliyofanyika mwaka huu.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
        
        <!-- Conclusion -->
        <h3>HITIMISHO</h3>
        <p>
            Ripoti hii ya mwaka inatoa picha kamili ya shughuli na takwimu za Kanisa la Ubungo End Time Message kwa mwaka {{ $reportYear }}.
            Tunathamini ushiriki wa kila mmoja katika kanisa letu na tunaendelea kuomba kwa ajili ya ukuaji wa kiroho na kiidadi katika mwaka ujao.
            Taarifa hizi zinalenga matumizi ya ndani ya kanisa na zinaweza kusasishwa wakati wowote kulingana na hali halisi.
        </p>
    </div>

    <!-- Footer -->
    <div class="footer">
        <div>Ripoti ya Mwaka {{ $reportYear }} | Kanisa la Ubungo End Time Message</div>
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