<div style="font-family: Arial, sans-serif;">
    <!-- Header -->
    <div style="text-align: center; border-bottom: 2px solid #003366; padding-bottom: 15px; margin-bottom: 20px; position: relative;">
        <div style="color: #003366; font-size: 20px; font-weight: bold; margin: 10px 0;">UBUNGO END TIME MESSAGE CHURCH</div>
        <div style="font-size: 12px;">
            <strong>Phone:</strong> +255 123 456 789 | 
            <strong>Email:</strong> office@ubungoetmc.org<br>
            <strong>Address:</strong> Ubungo, Dar Es Salaam, Tanzania
        </div>
    </div>
    
    <!-- Preview note -->
    <div style="background-color: #fff3cd; border: 1px solid #ffeeba; padding: 8px; margin-bottom: 15px; border-radius: 4px;">
        <strong>Preview Mode:</strong> This is a simplified preview. The PDF will include proper formatting, styling, and a background logo watermark.
    </div>
    
    <!-- Report Title -->
    <h2 style="text-align: center; color: #003366;">CHURCH STAFF DIRECTORY</h2>
    <p style="text-align: center; font-style: italic;">Generated on {{ now()->format('F j, Y') }}</p>
    
    <!-- Role Distribution -->
    <h3 style="color: #004080;">ROLE DISTRIBUTION</h3>
    <ul>
        @php
            $roleData = app(\App\Livewire\ChurchStaffReport::class)->prepareRoleData();
            $totalSupervisedMembers = app(\App\Livewire\ChurchStaffReport::class)->getTotalSupervisedMembers();
        @endphp
        
        @foreach($roleData as $roleId => $data)
            <li>
                {{ $data['name'] }}: {{ $data['count'] }} staff member{{ $data['count'] != 1 ? 's' : '' }}
                @if($roleId == 3) {{-- Deacons --}}
                    (supervising {{ $totalSupervisedMembers }} members)
                @endif
            </li>
        @endforeach
    </ul>
    
    <!-- Sample Table (Just showing the first role) -->
    <h3 style="color: #004080;">SAMPLE STAFF LISTING</h3>
    <p><i>Full report will include tables for all roles with complete data.</i></p>
    
    @php
        $firstRoleId = array_key_first($roleData);
        $firstName = $roleData[$firstRoleId]['name'];
        $firstUsers = $roleData[$firstRoleId]['users'];
    @endphp
    
    <h4>{{ strtoupper($firstName) }}</h4>
    
    <table style="width: 100%; border-collapse: collapse;">
        <thead>
            <tr style="background-color: #e6f0ff;">
                <th style="padding: 8px; text-align: left; border-bottom: 2px solid #003366;">Name</th>
                @if($firstRoleId == 3) {{-- Deacons --}}
                    <th style="padding: 8px; text-align: left; border-bottom: 2px solid #003366;">Members Supervised</th>
                @endif
                @if($firstRoleId == 6) {{-- Musicians --}}
                    <th style="padding: 8px; text-align: left; border-bottom: 2px solid #003366;">Specification</th>
                @endif
                <th style="padding: 8px; text-align: left; border-bottom: 2px solid #003366;">Email</th>
                <th style="padding: 8px; text-align: left; border-bottom: 2px solid #003366;">Phone</th>
            </tr>
        </thead>
        <tbody>
            @foreach($firstUsers->take(3) as $user)
                <tr style="border-bottom: 1px solid #ddd;">
                    <td style="padding: 8px;">{{ $user->name }}</td>
                    @if($firstRoleId == 3) {{-- Deacons --}}
                        <td style="padding: 8px;">{{ $user->supervisedCount }}</td>
                    @endif
                    @if($firstRoleId == 6) {{-- Musicians --}}
                        <td style="padding: 8px;">{{ $user->specification }}</td>
                    @endif
                    <td style="padding: 8px;">{{ $user->email }}</td>
                    <td style="padding: 8px;">{{ $user->phone }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    
    <p style="margin-top: 20px;">
        <i>... and more content for all roles in the full report.</i>
    </p>
</div>