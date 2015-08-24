<?php

use Illuminate\Database\Seeder;

class ServicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $services = [
            'Screen Replacement',
            'Battery Replacement',
            'Unlocking'
        ];

        foreach ($services as $service) {
            \App\Service::create([
                'name' => $service
            ]);
        }
    }
}


//'AppleSC', 'Apple iPad 2', 'Screen Replacement (Black)', 99.99, '817828013231');
//'AppleSC', 'Samsung Galaxy S4', 'Back Camera', 39.00, '817828015280');
//'SamsungSC', 'Samsung Galaxy S4', 'Battery', 39.00, '817828014092');
//'SamsungSC', 'Samsung Galaxy S4', 'Charge Port (AT&T)', 39.00, '817828014429');
//'SamsungSC', 'Samsung Galaxy S4', 'Charge Port (Sprint)', 39.00, '817828018014');
//'SamsungSC', 'Samsung Galaxy S4', 'Charge Port (T-Mobile)', 39.00, '817828018168');
//'SamsungSC', 'Samsung Galaxy S4', 'Charge Port (Verizon)', 39.00, '817828016447');
//'SamsungSC', 'Samsung Galaxy S4', 'Front Camera', 39.00, '817828015242');
//'SamsungSC', 'Samsung Galaxy S4', 'Home Button Key + Flex (Black-CDMA)', 39.00, '817828018175');
//'SamsungSC', 'Samsung Galaxy S4', 'Home Button Key + Flex (Black-GSM)', 39.00, '817828018182');
//'AppleSC', 'Apple iPad Mini 3', 'Screen Replacement (Black)', 99.99, '817828013545');
//'AppleSC', 'Apple iPad Mini 2', 'Screen Replacement (Black)', 99.99, '817828013545');
//'AppleSC', 'Apple iPad Mini 3', 'Screen Replacement (White)', 99.99, '817828013538');
//'AppleSC', 'Apple iPad Mini 2', 'Screen Replacement (White)', 99.99, '817828013538');
//'AppleSC', 'Apple iPad Mini 1', 'Screen Replacement (White)', 99.99, '817828013538');
//'AppleSC', 'Apple iPad Air 2', 'Screen Replacement (White)', 299.99, '817828013859');
//'AppleSC', 'Apple iPad Air 1', 'Screen Replacement (White)', 99.99, '817828013859');
//'AppleSC', 'Apple iPad 4', 'Bezel Replacement (White)', 39.00, '817828016607');
//'AppleSC', 'Apple iPad 3', 'Bezel Replacement (White)', 39.00, '817828016607');
//'AppleSC', 'Apple iPad 4', 'Bezel Replacement (Black)', 39.00, '817828016591');
//'AppleSC', 'Apple iPad 3', 'Bezel Replacement (Black)', 39.00, '817828016591');
//'AppleSC', 'Apple iPad 4', 'Screen Replacement (White)', 99.99, '817828013460');
//'AppleSC', 'Apple iPad 3', 'Screen Replacement (White)', 99.99, '817828013460');
//'AppleSC', 'Apple iPad 2', 'Wifi Antenna', 39.00, '817828014610');
//'AppleSC', 'Apple iPad 2', 'Power/Volume Button (Gen 2)', 39.00, '817828018236');
//'AppleSC', 'Apple iPad 2', 'Power/Volume Button (Gen 1)', 39.00, '817828015327');
//'AppleSC', 'Apple iPad 2', 'Screen Replacement (White)', 99.99, '817828013224');
//'AppleSC', 'Apple iPad 2', 'Bezel Replacement (White)', 39.00, '817828016577');
//'AppleSC', 'Apple iPad 2', 'Bezel Replacement (Black)', 39.00, '817828016584');
//'AppleSC', 'Apple iPhone 6+', 'Screen Replacement (White)', 150.00, '813583020149');
//'AppleSC', 'Apple iPhone 6+', 'Home Button Key + Flex (Silver)', 39.00, '813583020965');
//'AppleSC', 'Apple iPhone 6+', 'Home Button Key + Flex (Gold)', 39.00, '813583020989');
//'AppleSC', 'Apple iPhone 6+', 'Home Button Key + Flex (Black)', 39.00, '813583020972');
//'AppleSC', 'Apple iPhone 6+', 'Front Camera', 39.00, '813583020095');
//'AppleSC', 'Apple iPhone 6+', 'Charge Port/Headphone Jack (White)', 39.00, '817828019141');
//'AppleSC', 'Apple iPhone 6+', 'Charge Port/Headphone Jack (Black)', 39.00, '817828018496');
//'AppleSC', 'Apple iPhone 6+', 'Battery', 39.00, '813583020071');
//'AppleSC', 'Apple iPhone 6+', 'Back Camera', 39.00, '813583020064');
//'AppleSC', 'Apple iPhone 6', 'Loudspeaker', 39.00, '813583021047');
//'AppleSC', 'Apple iPhone 6', 'Screen Replacement (White)', 120.00, '813583020958');
//'AppleSC', 'Apple iPhone 6', 'Home Button Key + Flex (Silver)', 39.00, '817828019097');
//'AppleSC', 'Apple iPhone 6', 'Home Button Key + Flex (Gold)', 39.00, '817828019103');
//'AppleSC', 'Apple iPhone 6', 'Home Button Key + Flex (Black)', 39.00, '817828017840');
//'AppleSC', 'Apple iPhone 6', 'Front Camera', 39.00, '817828017864');
//'AppleSC', 'Apple iPhone 6', 'Charge Port/Headphone Jack (White)', 39.00, '817828019080');
//'AppleSC', 'Apple iPhone 6', 'Charge Port/Headphone Jack (Black)', 39.00, '817828017895');
//'AppleSC', 'Apple iPhone 6', 'Battery', 39.00, '817828019967');
//'AppleSC', 'Apple iPhone 6', 'Back Camera', 39.00, '817828019943');
//'AppleSC', 'Apple iPhone 5S', 'Loudspeaker', 39.00, '817828014252');
//'AppleSC', 'Apple iPhone 5S', 'Screen Replacement (White)', 90.00, '817828013941');
//'AppleSC', 'Apple iPhone 5S', 'Home Button Key + Flex (White)', 39.00, '817828016065');
//'AppleSC', 'Apple iPhone 5S', 'Home Button Key + Flex (Black)', 39.00, '817828014139');
//'AppleSC', 'Apple iPhone 5S', 'Front Camera', 39.00, '817828014986');
//'AppleSC', 'Apple iPhone 5S', 'Charge Port/Headphone Jack (White)', 39.00, '817828016041');
//'AppleSC', 'Apple iPhone 5S', 'Charge Port/Headphone Jack (Black)', 39.00, '817828016034');
//'AppleSC', 'Apple iPhone 5S', 'Back Camera', 39.00, '817828016089');
//'AppleSC', 'Apple iPhone 5S', 'Battery', 39.00, '817828013927');
//'AppleSC', 'Apple iPhone 5C', 'Battery', 39.00, '817828013927');
//'AppleSC', 'Apple iPhone 5C', 'Loudspeaker', 39.00, '817828019790');
//'AppleSC', 'Apple iPhone 5C', 'Home Button Key + Flex (Black)', 39.00, '817828016508');
//'AppleSC', 'Apple iPhone 5C', 'Front Camera', 39.00, '817828014269');
//'AppleSC', 'Apple iPhone 5C', 'Charge Port/Headphone Jack', 39.00, '817828016003');
//'AppleSC', 'Apple iPhone 5C', 'Back Camera', 39.00, '817828018366');
//'AppleSC', 'Apple iPhone 5', 'Loudspeaker', 39.00, '817828014351');
//'AppleSC', 'Apple iPhone 5', 'Screen Replacement (White)', 90.00, '817828013200');
//'AppleSC', 'Apple iPhone 5', 'Home Button Key + Flex (White)', 39.00, '817828014948');
//'AppleSC', 'Apple iPhone 5', 'Home Button Key + Flex (Black)', 39.00, '817828014313');
//'AppleSC', 'Apple iPhone 5', 'Front Camera', 39.00, '817828014320');
//'AppleSC', 'Apple iPhone 5', 'Charge Port (White)', 39.00, '817828014641');
//'AppleSC', 'Apple iPhone 5', 'Charge Port (Black)', 39.00, '817828014306');
//'AppleSC', 'Apple iPhone 5', 'Battery', 39.00, '817828013248');
//'AppleSC', 'Apple iPhone 5', 'Back Camera', 39.00, '817828014337');
//'SamsungSC', 'Samsung Galaxy S6 Edge', 'Screen Replacement (White)', 299.99, '813583022280');
//'SamsungSC', 'Samsung Galaxy S6 Edge', 'Screen Replacement (Gold)', 299.99, '813583022273');
//'SamsungSC', 'Samsung Galaxy S6 Edge', 'Battery', 39.00, '813583022457');
//'SamsungSC', 'Samsung Galaxy S6 Edge', 'Back Cover (White)', 39.00, '813583022358');
//'SamsungSC', 'Samsung Galaxy S6 Edge', 'Back Cover (Gold)', 39.00, '813583022341');
//'SamsungSC', 'Samsung Galaxy S6 Edge', 'Back Cover (Black)', 39.00, '813583022334');
//'SamsungSC', 'Samsung Galaxy S6', 'Screen Replacement (White)', 239.99, '813583022006');
//'SamsungSC', 'Samsung Galaxy S6', 'Screen Replacement (Gold)', 239.99, '813583022013');
//'SamsungSC', 'Samsung Galaxy S6', 'Battery', 39.00, '813583022228');
//'SamsungSC', 'Samsung Galaxy S6', 'Back Cover (White)', 39.00, '813583022037');
//'SamsungSC', 'Samsung Galaxy S6', 'Back Cover (Gold)', 39.00, '813583022044');
//'SamsungSC', 'Samsung Galaxy S6', 'Back Cover (Black)', 39.00, '813583022020');
//'SamsungSC', 'Samsung Galaxy S5', 'Charge Port (Verizon)', 39.00, '817828019530');
//'SamsungSC', 'Samsung Galaxy S5', 'Charge Port (T-Mobile)', 39.00, '817828019623');
//'SamsungSC', 'Samsung Galaxy S5', 'Charge Port (Sprint)', 39.00, '817828019547');
//'SamsungSC', 'Samsung Galaxy S5', 'Charge Port (AT&T)', 39.00, '817828016317');
//'SamsungSC', 'Samsung Galaxy S5', 'Screen Replacement (White)', 200.00, '817828015624');
//'SamsungSC', 'Samsung Galaxy S5', 'Home Button Key + Flex (White)', 39.00, '817828016720');
//'SamsungSC', 'Samsung Galaxy S5', 'Home Button Key + Flex (Black)', 39.00, '817828016348');
//'SamsungSC', 'Samsung Galaxy S5', 'Front Camera', 39.00, '817828016294');
//'SamsungSC', 'Samsung Galaxy S5', 'Battery', 39.00, '817828016980');
//'SamsungSC', 'Samsung Galaxy S5', 'Back Camera', 39.00, '817828016300');
//'SamsungSC', 'Samsung Galaxy S4', 'Screen Replacement (White)', 150.00, '817828013798');
//'SamsungSC', 'Samsung Galaxy S4', 'Home Button Key + Flex (White-GSM)', 39.00, '817828018205');
//'SamsungSC', 'Samsung Galaxy S4', 'Home Button Key + Flex (White-CDMA)', 39.00, '817828018199');
//'AppleSC', 'Apple iPad 3', 'Screen Replacement (Black)', 99.99, '817828013583');
//'AppleSC', 'Apple iPad 4', 'Screen Replacement (Black)', 99.99, '817828013583');
//'AppleSC', 'Apple iPad Air 1', 'Screen Replacement (Black)', 99.99, '817828013873');
//'AppleSC', 'Apple iPad Air 2', 'Screen Replacement (Black)', 299.99, '817828013873');
//'AppleSC', 'Apple iPad Mini 1', 'Screen Replacement (Black)', 99.99, '817828013545');
//'AppleSC', 'Apple iPhone 5', 'Screen Replacement (Black)', 90.00, '817828013217');
//'AppleSC', 'Apple iPhone 5S', 'Screen Replacement (Black)', 90.00, '817828013965');
//'AppleSC', 'Apple iPhone 5C', 'Screen Replacement', 90.00, '817828013897');
//'AppleSC', 'Apple iPhone 6', 'Screen Replacement (Black)', 120.00, '813583020941');
//'AppleSC', 'Apple iPhone 6+', 'Screen Replacement (Black)', 150.00, '813583020132');
//'SamsungSC', 'Samsung Galaxy S4', 'Screen Replacement (Black)', 150.00, '817828013262');
//'SamsungSC', 'Samsung Galaxy S5', 'Screen Replacement (Black)', 200.00, '817828015617');
//'SamsungSC', 'Samsung Galaxy S6', 'Screen Replacement (Black)', 239.99, '813583021993');
//'SamsungSC', 'Samsung Galaxy S6 Edge', 'Screen Replacement (Black)', 299.99, '813583022266');