<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MeetingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('meetings')->insert([
            [
                'nameGoal' => 'Annual General Meeting',
                'organization' => 'Company A',
                'basis' => 'Annual Report',
                'format' => 'In-Person',
                'date' => Carbon::parse('2024-11-05'),
                'address' => '123 Main St, City A',
                'list' => 'List of attendees: CEO, CFO, CTO, etc.',
                'quarters_id' => 1, // Reference to quarters ID 1
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nameGoal' => 'Quarterly Business Review',
                'organization' => 'Company B',
                'basis' => 'Quarterly Review',
                'format' => 'Virtual',
                'date' => Carbon::parse('2024-11-10'),
                'address' => 'Virtual Meeting',
                'list' => 'List of attendees: Managers, Directors, etc.',
                'quarters_id' => 2, // Reference to quarters ID 2
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nameGoal' => 'Strategy Planning Session',
                'organization' => 'Company C',
                'basis' => 'Strategy Planning for Next Year',
                'format' => 'In-Person',
                'date' => Carbon::parse('2024-11-12'),
                'address' => '456 Business Rd, City B',
                'list' => 'List of attendees: Executive Team, Strategy Team',
                'quarters_id' => 3, // Reference to quarters ID 3
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nameGoal' => 'Product Launch Discussion',
                'organization' => 'Company D',
                'basis' => 'New Product Launch',
                'format' => 'Hybrid',
                'date' => Carbon::parse('2024-11-15'),
                'address' => '789 Launch Blvd, City C',
                'list' => 'List of attendees: Product Managers, Marketing Team',
                'quarters_id' => 4, // Reference to quarters ID 4
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nameGoal' => 'Employee Feedback Session',
                'organization' => 'Company E',
                'basis' => 'Annual Employee Feedback',
                'format' => 'In-Person',
                'date' => Carbon::parse('2024-11-18'),
                'address' => '102 Employee St, City D',
                'list' => 'List of attendees: HR, Employees from all departments',
                'quarters_id' => 1, // Reference to quarters ID 1
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nameGoal' => 'Client Engagement Meeting',
                'organization' => 'Company F',
                'basis' => 'Client Engagement Strategy',
                'format' => 'Virtual',
                'date' => Carbon::parse('2024-11-20'),
                'address' => 'Virtual Meeting',
                'list' => 'List of attendees: Sales Team, Account Managers',
                'quarters_id' => 2, // Reference to quarters ID 2
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nameGoal' => 'Sales Target Meeting',
                'organization' => 'Company G',
                'basis' => 'Sales Target Achievement',
                'format' => 'Hybrid',
                'date' => Carbon::parse('2024-11-25'),
                'address' => '500 Sales Ave, City E',
                'list' => 'List of attendees: Sales Team, Marketing Team',
                'quarters_id' => 3, // Reference to quarters ID 3
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nameGoal' => 'Marketing Strategy Session',
                'organization' => 'Company H',
                'basis' => 'Marketing Strategy for the Next Quarter',
                'format' => 'In-Person',
                'date' => Carbon::parse('2024-11-30'),
                'address' => '600 Marketing St, City F',
                'list' => 'List of attendees: Marketing Managers, Brand Strategists',
                'quarters_id' => 4, // Reference to quarters ID 4
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nameGoal' => 'Executive Leadership Forum',
                'organization' => 'Company I',
                'basis' => 'Leadership Growth',
                'format' => 'Virtual',
                'date' => Carbon::parse('2024-12-01'),
                'address' => 'Virtual Meeting',
                'list' => 'List of attendees: C-Level Executives, Board Members',
                'quarters_id' => 1, // Reference to quarters ID 1
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nameGoal' => 'Budget Planning Discussion',
                'organization' => 'Company J',
                'basis' => 'Budget Planning for the Next Fiscal Year',
                'format' => 'In-Person',
                'date' => Carbon::parse('2024-12-05'),
                'address' => '700 Finance St, City G',
                'list' => 'List of attendees: Finance Team, Executives',
                'quarters_id' => 2, // Reference to quarters ID 2
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
