<?php

use Illuminate\Database\Seeder;

class DeviceServicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $devices_and_services = [
            [
                'manufacturer' => 'AppleSC',
                'model'        => 'Apple iPad 2',
                'service'      => 'Screen Replacement (Black)',
                'price'        => 99.99,
                'upc'          => '817828013231'
            ],
            [
                'manufacturer' => 'AppleSC',
                'model'        => 'Samsung Galaxy S4',
                'service'      => 'Back Camera',
                'price'        => 39.00,
                'upc'          => '817828015280'
            ],
            [
                'manufacturer' => 'SamsungSC',
                'model'        => 'Samsung Galaxy S4',
                'service'      => 'Battery',
                'price'        => 39.00,
                'upc'          => '817828014092'
            ],
            [
                'manufacturer' => 'SamsungSC',
                'model'        => 'Samsung Galaxy S4',
                'service'      => 'Charge Port (AT&T)',
                'price'        => 39.00,
                'upc'          => '817828014429'
            ],
            [
                'manufacturer' => 'SamsungSC',
                'model'        => 'Samsung Galaxy S4',
                'service'      => 'Charge Port (Sprint)',
                'price'        => 39.00,
                'upc'          => '817828018014'
            ],
            [
                'manufacturer' => 'SamsungSC',
                'model'        => 'Samsung Galaxy S4',
                'service'      => 'Charge Port (T-Mobile)',
                'price'        => 39.00,
                'upc'          => '817828018168'
            ],
            [
                'manufacturer' => 'SamsungSC',
                'model'        => 'Samsung Galaxy S4',
                'service'      => 'Charge Port (Verizon)',
                'price'        => 39.00,
                'upc'          => '817828016447'
            ],
            [
                'manufacturer' => 'SamsungSC',
                'model'        => 'Samsung Galaxy S4',
                'service'      => 'Front Camera',
                'price'        => 39.00,
                'upc'          => '817828015242'
            ],
            [
                'manufacturer' => 'SamsungSC',
                'model'        => 'Samsung Galaxy S4',
                'service'      => 'Home Button Key + Flex (Black-CDMA)',
                'price'        => 39.00,
                'upc'          => '817828018175'
            ],
            [
                'manufacturer' => 'SamsungSC',
                'model'        => 'Samsung Galaxy S4',
                'service'      => 'Home Button Key + Flex (Black-GSM)',
                'price'        => 39.00,
                'upc'          => '817828018182'
            ],
            [
                'manufacturer' => 'AppleSC',
                'model'        => 'Apple iPad Mini 3',
                'service'      => 'Screen Replacement (Black)',
                'price'        => 99.99,
                'upc'          => '817828013545'
            ],
            [
                'manufacturer' => 'AppleSC',
                'model'        => 'Apple iPad Mini 2',
                'service'      => 'Screen Replacement (Black)',
                'price'        => 99.99,
                'upc'          => '817828013545'
            ],
            [
                'manufacturer' => 'AppleSC',
                'model'        => 'Apple iPad Mini 3',
                'service'      => 'Screen Replacement (White)',
                'price'        => 99.99,
                'upc'          => '817828013538'
            ],
            [
                'manufacturer' => 'AppleSC',
                'model'        => 'Apple iPad Mini 2',
                'service'      => 'Screen Replacement (White)',
                'price'        => 99.99,
                'upc'          => '817828013538'
            ],
            [
                'manufacturer' => 'AppleSC',
                'model'        => 'Apple iPad Mini 1',
                'service'      => 'Screen Replacement (White)',
                'price'        => 99.99,
                'upc'          => '817828013538'
            ],
            [
                'manufacturer' => 'AppleSC',
                'model'        => 'Apple iPad Air 2',
                'service'      => 'Screen Replacement (White)',
                'price'        => 299.99,
                'upc'          => '817828013859'
            ],
            [
                'manufacturer' => 'AppleSC',
                'model'        => 'Apple iPad Air 1',
                'service'      => 'Screen Replacement (White)',
                'price'        => 99.99,
                'upc'          => '817828013859'
            ],
            [
                'manufacturer' => 'AppleSC',
                'model'        => 'Apple iPad 4',
                'service'      => 'Bezel Replacement (White)',
                'price'        => 39.00,
                'upc'          => '817828016607'
            ],
            [
                'manufacturer' => 'AppleSC',
                'model'        => 'Apple iPad 3',
                'service'      => 'Bezel Replacement (White)',
                'price'        => 39.00,
                'upc'          => '817828016607'
            ],
            [
                'manufacturer' => 'AppleSC',
                'model'        => 'Apple iPad 4',
                'service'      => 'Bezel Replacement (Black)',
                'price'        => 39.00,
                'upc'          => '817828016591'
            ],
            [
                'manufacturer' => 'AppleSC',
                'model'        => 'Apple iPad 3',
                'service'      => 'Bezel Replacement (Black)',
                'price'        => 39.00,
                'upc'          => '817828016591'
            ],
            [
                'manufacturer' => 'AppleSC',
                'model'        => 'Apple iPad 4',
                'service'      => 'Screen Replacement (White)',
                'price'        => 99.99,
                'upc'          => '817828013460'
            ],
            [
                'manufacturer' => 'AppleSC',
                'model'        => 'Apple iPad 3',
                'service'      => 'Screen Replacement (White)',
                'price'        => 99.99,
                'upc'          => '817828013460'
            ],
            [
                'manufacturer' => 'AppleSC',
                'model'        => 'Apple iPad 2',
                'service'      => 'Wifi Antenna',
                'price'        => 39.00,
                'upc'          => '817828014610'
            ],
            [
                'manufacturer' => 'AppleSC',
                'model'        => 'Apple iPad 2',
                'service'      => 'Power/Volume Button (Gen 2)',
                'price'        => 39.00,
                'upc'          => '817828018236'
            ],
            [
                'manufacturer' => 'AppleSC',
                'model'        => 'Apple iPad 2',
                'service'      => 'Power/Volume Button (Gen 1)',
                'price'        => 39.00,
                'upc'          => '817828015327'
            ],
            [
                'manufacturer' => 'AppleSC',
                'model'        => 'Apple iPad 2',
                'service'      => 'Screen Replacement (White)',
                'price'        => 99.99,
                'upc'          => '817828013224'
            ],
            [
                'manufacturer' => 'AppleSC',
                'model'        => 'Apple iPad 2',
                'service'      => 'Bezel Replacement (White)',
                'price'        => 39.00,
                'upc'          => '817828016577'
            ],
            [
                'manufacturer' => 'AppleSC',
                'model'        => 'Apple iPad 2',
                'service'      => 'Bezel Replacement (Black)',
                'price'        => 39.00,
                'upc'          => '817828016584'
            ],
            [
                'manufacturer' => 'AppleSC',
                'model'        => 'Apple iPhone 6 Plus',
                'service'      => 'Screen Replacement (White)',
                'price'        => 150.00,
                'upc'          => '813583020149'
            ],
            [
                'manufacturer' => 'AppleSC',
                'model'        => 'Apple iPhone 6 Plus',
                'service'      => 'Home Button Key + Flex (Silver)',
                'price'        => 39.00,
                'upc'          => '813583020965'
            ],
            [
                'manufacturer' => 'AppleSC',
                'model'        => 'Apple iPhone 6 Plus',
                'service'      => 'Home Button Key + Flex (Gold)',
                'price'        => 39.00,
                'upc'          => '813583020989'
            ],
            [
                'manufacturer' => 'AppleSC',
                'model'        => 'Apple iPhone 6 Plus',
                'service'      => 'Home Button Key + Flex (Black)',
                'price'        => 39.00,
                'upc'          => '813583020972'
            ],
            [
                'manufacturer' => 'AppleSC',
                'model'        => 'Apple iPhone 6 Plus',
                'service'      => 'Front Camera',
                'price'        => 39.00,
                'upc'          => '813583020095'
            ],
            [
                'manufacturer' => 'AppleSC',
                'model'        => 'Apple iPhone 6 Plus',
                'service'      => 'Charge Port/Headphone Jack (White)',
                'price'        => 39.00,
                'upc'          => '817828019141'
            ],
            [
                'manufacturer' => 'AppleSC',
                'model'        => 'Apple iPhone 6 Plus',
                'service'      => 'Charge Port/Headphone Jack (Black)',
                'price'        => 39.00,
                'upc'          => '817828018496'
            ],
            [
                'manufacturer' => 'AppleSC',
                'model'        => 'Apple iPhone 6 Plus',
                'service'      => 'Battery',
                'price'        => 39.00,
                'upc'          => '813583020071'
            ],
            [
                'manufacturer' => 'AppleSC',
                'model'        => 'Apple iPhone 6 Plus',
                'service'      => 'Back Camera',
                'price'        => 39.00,
                'upc'          => '813583020064'
            ],
            [
                'manufacturer' => 'AppleSC',
                'model'        => 'Apple iPhone 6',
                'service'      => 'Loudspeaker',
                'price'        => 39.00,
                'upc'          => '813583021047'
            ],
            [
                'manufacturer' => 'AppleSC',
                'model'        => 'Apple iPhone 6',
                'service'      => 'Screen Replacement (White)',
                'price'        => 120.00,
                'upc'          => '813583020958'
            ],
            [
                'manufacturer' => 'AppleSC',
                'model'        => 'Apple iPhone 6',
                'service'      => 'Home Button Key + Flex (Silver)',
                'price'        => 39.00,
                'upc'          => '817828019097'
            ],
            [
                'manufacturer' => 'AppleSC',
                'model'        => 'Apple iPhone 6',
                'service'      => 'Home Button Key + Flex (Gold)',
                'price'        => 39.00,
                'upc'          => '817828019103'
            ],
            [
                'manufacturer' => 'AppleSC',
                'model'        => 'Apple iPhone 6',
                'service'      => 'Home Button Key + Flex (Black)',
                'price'        => 39.00,
                'upc'          => '817828017840'
            ],
            [
                'manufacturer' => 'AppleSC',
                'model'        => 'Apple iPhone 6',
                'service'      => 'Front Camera',
                'price'        => 39.00,
                'upc'          => '817828017864'
            ],
            [
                'manufacturer' => 'AppleSC',
                'model'        => 'Apple iPhone 6',
                'service'      => 'Charge Port/Headphone Jack (White)',
                'price'        => 39.00,
                'upc'          => '817828019080'
            ],
            [
                'manufacturer' => 'AppleSC',
                'model'        => 'Apple iPhone 6',
                'service'      => 'Charge Port/Headphone Jack (Black)',
                'price'        => 39.00,
                'upc'          => '817828017895'
            ],
            [
                'manufacturer' => 'AppleSC',
                'model'        => 'Apple iPhone 6',
                'service'      => 'Battery',
                'price'        => 39.00,
                'upc'          => '817828019967'
            ],
            [
                'manufacturer' => 'AppleSC',
                'model'        => 'Apple iPhone 6',
                'service'      => 'Back Camera',
                'price'        => 39.00,
                'upc'          => '817828019943'
            ],
            [
                'manufacturer' => 'AppleSC',
                'model'        => 'Apple iPhone 5S',
                'service'      => 'Loudspeaker',
                'price'        => 39.00,
                'upc'          => '817828014252'
            ],
            [
                'manufacturer' => 'AppleSC',
                'model'        => 'Apple iPhone 5S',
                'service'      => 'Screen Replacement (White)',
                'price'        => 90.00,
                'upc'          => '817828013941'
            ],
            [
                'manufacturer' => 'AppleSC',
                'model'        => 'Apple iPhone 5S',
                'service'      => 'Home Button Key + Flex (White)',
                'price'        => 39.00,
                'upc'          => '817828016065'
            ],
            [
                'manufacturer' => 'AppleSC',
                'model'        => 'Apple iPhone 5S',
                'service'      => 'Home Button Key + Flex (Black)',
                'price'        => 39.00,
                'upc'          => '817828014139'
            ],
            [
                'manufacturer' => 'AppleSC',
                'model'        => 'Apple iPhone 5S',
                'service'      => 'Front Camera',
                'price'        => 39.00,
                'upc'          => '817828014986'
            ],
            [
                'manufacturer' => 'AppleSC',
                'model'        => 'Apple iPhone 5S',
                'service'      => 'Charge Port/Headphone Jack (White)',
                'price'        => 39.00,
                'upc'          => '817828016041'
            ],
            [
                'manufacturer' => 'AppleSC',
                'model'        => 'Apple iPhone 5S',
                'service'      => 'Charge Port/Headphone Jack (Black)',
                'price'        => 39.00,
                'upc'          => '817828016034'
            ],
            [
                'manufacturer' => 'AppleSC',
                'model'        => 'Apple iPhone 5S',
                'service'      => 'Back Camera',
                'price'        => 39.00,
                'upc'          => '817828016089'
            ],
            [
                'manufacturer' => 'AppleSC',
                'model'        => 'Apple iPhone 5S',
                'service'      => 'Battery',
                'price'        => 39.00,
                'upc'          => '817828013927'
            ],
            [
                'manufacturer' => 'AppleSC',
                'model'        => 'Apple iPhone 5C',
                'service'      => 'Battery',
                'price'        => 39.00,
                'upc'          => '817828013927'
            ],
            [
                'manufacturer' => 'AppleSC',
                'model'        => 'Apple iPhone 5C',
                'service'      => 'Loudspeaker',
                'price'        => 39.00,
                'upc'          => '817828019790'
            ],
            [
                'manufacturer' => 'AppleSC',
                'model'        => 'Apple iPhone 5C',
                'service'      => 'Home Button Key + Flex (Black)',
                'price'        => 39.00,
                'upc'          => '817828016508'
            ],
            [
                'manufacturer' => 'AppleSC',
                'model'        => 'Apple iPhone 5C',
                'service'      => 'Front Camera',
                'price'        => 39.00,
                'upc'          => '817828014269'
            ],
            [
                'manufacturer' => 'AppleSC',
                'model'        => 'Apple iPhone 5C',
                'service'      => 'Charge Port/Headphone Jack',
                'price'        => 39.00,
                'upc'          => '817828016003'
            ],
            [
                'manufacturer' => 'AppleSC',
                'model'        => 'Apple iPhone 5C',
                'service'      => 'Back Camera',
                'price'        => 39.00,
                'upc'          => '817828018366'
            ],
            [
                'manufacturer' => 'AppleSC',
                'model'        => 'Apple iPhone 5',
                'service'      => 'Loudspeaker',
                'price'        => 39.00,
                'upc'          => '817828014351'
            ],
            [
                'manufacturer' => 'AppleSC',
                'model'        => 'Apple iPhone 5',
                'service'      => 'Screen Replacement (White)',
                'price'        => 90.00,
                'upc'          => '817828013200'
            ],
            [
                'manufacturer' => 'AppleSC',
                'model'        => 'Apple iPhone 5',
                'service'      => 'Home Button Key + Flex (White)',
                'price'        => 39.00,
                'upc'          => '817828014948'
            ],
            [
                'manufacturer' => 'AppleSC',
                'model'        => 'Apple iPhone 5',
                'service'      => 'Home Button Key + Flex (Black)',
                'price'        => 39.00,
                'upc'          => '817828014313'
            ],
            [
                'manufacturer' => 'AppleSC',
                'model'        => 'Apple iPhone 5',
                'service'      => 'Front Camera',
                'price'        => 39.00,
                'upc'          => '817828014320'
            ],
            [
                'manufacturer' => 'AppleSC',
                'model'        => 'Apple iPhone 5',
                'service'      => 'Charge Port (White)',
                'price'        => 39.00,
                'upc'          => '817828014641'
            ],
            [
                'manufacturer' => 'AppleSC',
                'model'        => 'Apple iPhone 5',
                'service'      => 'Charge Port (Black)',
                'price'        => 39.00,
                'upc'          => '817828014306'
            ],
            [
                'manufacturer' => 'AppleSC',
                'model'        => 'Apple iPhone 5',
                'service'      => 'Battery',
                'price'        => 39.00,
                'upc'          => '817828013248'
            ],
            [
                'manufacturer' => 'AppleSC',
                'model'        => 'Apple iPhone 5',
                'service'      => 'Back Camera',
                'price'        => 39.00,
                'upc'          => '817828014337'
            ],
            [
                'manufacturer' => 'SamsungSC',
                'model'        => 'Samsung Galaxy S6 Edge',
                'service'      => 'Screen Replacement (White)',
                'price'        => 299.99,
                'upc'          => '813583022280'
            ],
            [
                'manufacturer' => 'SamsungSC',
                'model'        => 'Samsung Galaxy S6 Edge',
                'service'      => 'Screen Replacement (Gold)',
                'price'        => 299.99,
                'upc'          => '813583022273'
            ],
            [
                'manufacturer' => 'SamsungSC',
                'model'        => 'Samsung Galaxy S6 Edge',
                'service'      => 'Battery',
                'price'        => 39.00,
                'upc'          => '813583022457'
            ],
            [
                'manufacturer' => 'SamsungSC',
                'model'        => 'Samsung Galaxy S6 Edge',
                'service'      => 'Back Cover (White)',
                'price'        => 39.00,
                'upc'          => '813583022358'
            ],
            [
                'manufacturer' => 'SamsungSC',
                'model'        => 'Samsung Galaxy S6 Edge',
                'service'      => 'Back Cover (Gold)',
                'price'        => 39.00,
                'upc'          => '813583022341'
            ],
            [
                'manufacturer' => 'SamsungSC',
                'model'        => 'Samsung Galaxy S6 Edge',
                'service'      => 'Back Cover (Black)',
                'price'        => 39.00,
                'upc'          => '813583022334'
            ],
            [
                'manufacturer' => 'SamsungSC',
                'model'        => 'Samsung Galaxy S6',
                'service'      => 'Screen Replacement (White)',
                'price'        => 239.99,
                'upc'          => '813583022006'
            ],
            [
                'manufacturer' => 'SamsungSC',
                'model'        => 'Samsung Galaxy S6',
                'service'      => 'Screen Replacement (Gold)',
                'price'        => 239.99,
                'upc'          => '813583022013'
            ],
            [
                'manufacturer' => 'SamsungSC',
                'model'        => 'Samsung Galaxy S6',
                'service'      => 'Battery',
                'price'        => 39.00,
                'upc'          => '813583022228'
            ],
            [
                'manufacturer' => 'SamsungSC',
                'model'        => 'Samsung Galaxy S6',
                'service'      => 'Back Cover (White)',
                'price'        => 39.00,
                'upc'          => '813583022037'
            ],
            [
                'manufacturer' => 'SamsungSC',
                'model'        => 'Samsung Galaxy S6',
                'service'      => 'Back Cover (Gold)',
                'price'        => 39.00,
                'upc'          => '813583022044'
            ],
            [
                'manufacturer' => 'SamsungSC',
                'model'        => 'Samsung Galaxy S6',
                'service'      => 'Back Cover (Black)',
                'price'        => 39.00,
                'upc'          => '813583022020'
            ],
            [
                'manufacturer' => 'SamsungSC',
                'model'        => 'Samsung Galaxy S5',
                'service'      => 'Charge Port (Verizon)',
                'price'        => 39.00,
                'upc'          => '817828019530'
            ],
            [
                'manufacturer' => 'SamsungSC',
                'model'        => 'Samsung Galaxy S5',
                'service'      => 'Charge Port (T-Mobile)',
                'price'        => 39.00,
                'upc'          => '817828019623'
            ],
            [
                'manufacturer' => 'SamsungSC',
                'model'        => 'Samsung Galaxy S5',
                'service'      => 'Charge Port (Sprint)',
                'price'        => 39.00,
                'upc'          => '817828019547'
            ],
            [
                'manufacturer' => 'SamsungSC',
                'model'        => 'Samsung Galaxy S5',
                'service'      => 'Charge Port (AT&T)',
                'price'        => 39.00,
                'upc'          => '817828016317'
            ],
            [
                'manufacturer' => 'SamsungSC',
                'model'        => 'Samsung Galaxy S5',
                'service'      => 'Screen Replacement (White)',
                'price'        => 200.00,
                'upc'          => '817828015624'
            ],
            [
                'manufacturer' => 'SamsungSC',
                'model'        => 'Samsung Galaxy S5',
                'service'      => 'Home Button Key + Flex (White)',
                'price'        => 39.00,
                'upc'          => '817828016720'
            ],
            [
                'manufacturer' => 'SamsungSC',
                'model'        => 'Samsung Galaxy S5',
                'service'      => 'Home Button Key + Flex (Black)',
                'price'        => 39.00,
                'upc'          => '817828016348'
            ],
            [
                'manufacturer' => 'SamsungSC',
                'model'        => 'Samsung Galaxy S5',
                'service'      => 'Front Camera',
                'price'        => 39.00,
                'upc'          => '817828016294'
            ],
            [
                'manufacturer' => 'SamsungSC',
                'model'        => 'Samsung Galaxy S5',
                'service'      => 'Battery',
                'price'        => 39.00,
                'upc'          => '817828016980'
            ],
            [
                'manufacturer' => 'SamsungSC',
                'model'        => 'Samsung Galaxy S5',
                'service'      => 'Back Camera',
                'price'        => 39.00,
                'upc'          => '817828016300'
            ],
            [
                'manufacturer' => 'SamsungSC',
                'model'        => 'Samsung Galaxy S4',
                'service'      => 'Screen Replacement (White)',
                'price'        => 150.00,
                'upc'          => '817828013798'
            ],
            [
                'manufacturer' => 'SamsungSC',
                'model'        => 'Samsung Galaxy S4',
                'service'      => 'Home Button Key + Flex (White-GSM)',
                'price'        => 39.00,
                'upc'          => '817828018205'
            ],
            [
                'manufacturer' => 'SamsungSC',
                'model'        => 'Samsung Galaxy S4',
                'service'      => 'Home Button Key + Flex (White-CDMA)',
                'price'        => 39.00,
                'upc'          => '817828018199'
            ],
            [
                'manufacturer' => 'AppleSC',
                'model'        => 'Apple iPad 3',
                'service'      => 'Screen Replacement (Black)',
                'price'        => 99.99,
                'upc'          => '817828013583'
            ],
            [
                'manufacturer' => 'AppleSC',
                'model'        => 'Apple iPad 4',
                'service'      => 'Screen Replacement (Black)',
                'price'        => 99.99,
                'upc'          => '817828013583'
            ],
            [
                'manufacturer' => 'AppleSC',
                'model'        => 'Apple iPad Air 1',
                'service'      => 'Screen Replacement (Black)',
                'price'        => 99.99,
                'upc'          => '817828013873'
            ],
            [
                'manufacturer' => 'AppleSC',
                'model'        => 'Apple iPad Air 2',
                'service'      => 'Screen Replacement (Black)',
                'price'        => 299.99,
                'upc'          => '817828013873'
            ],
            [
                'manufacturer' => 'AppleSC',
                'model'        => 'Apple iPad Mini 1',
                'service'      => 'Screen Replacement (Black)',
                'price'        => 99.99,
                'upc'          => '817828013545'
            ],
            [
                'manufacturer' => 'AppleSC',
                'model'        => 'Apple iPhone 5',
                'service'      => 'Screen Replacement (Black)',
                'price'        => 90.00,
                'upc'          => '817828013217'
            ],
            [
                'manufacturer' => 'AppleSC',
                'model'        => 'Apple iPhone 5S',
                'service'      => 'Screen Replacement (Black)',
                'price'        => 90.00,
                'upc'          => '817828013965'
            ],
            [
                'manufacturer' => 'AppleSC',
                'model'        => 'Apple iPhone 5C',
                'service'      => 'Screen Replacement',
                'price'        => 90.00,
                'upc'          => '817828013897'
            ],
            [
                'manufacturer' => 'AppleSC',
                'model'        => 'Apple iPhone 6',
                'service'      => 'Screen Replacement (Black)',
                'price'        => 120.00,
                'upc'          => '813583020941'
            ],
            [
                'manufacturer' => 'AppleSC',
                'model'        => 'Apple iPhone 6 Plus',
                'service'      => 'Screen Replacement (Black)',
                'price'        => 150.00,
                'upc'          => '813583020132'
            ],
            [
                'manufacturer' => 'SamsungSC',
                'model'        => 'Samsung Galaxy S4',
                'service'      => 'Screen Replacement (Black)',
                'price'        => 150.00,
                'upc'          => '817828013262'
            ],
            [
                'manufacturer' => 'SamsungSC',
                'model'        => 'Samsung Galaxy S5',
                'service'      => 'Screen Replacement (Black)',
                'price'        => 200.00,
                'upc'          => '817828015617'
            ],
            [
                'manufacturer' => 'SamsungSC',
                'model'        => 'Samsung Galaxy S6',
                'service'      => 'Screen Replacement (Black)',
                'price'        => 239.99,
                'upc'          => '813583021993'
            ],
            [
                'manufacturer' => 'SamsungSC',
                'model'        => 'Samsung Galaxy S6 Edge',
                'service'      => 'Screen Replacement (Black)',
                'price'        => 299.99,
                'upc'          => '813583022266'
            ]
        ];

        foreach ($devices_and_services as $ds) {
            $device = \App\Device::firstOrCreate([
                'manufacturer' => $ds['manufacturer'],
                'model'        => $ds['model'],
                'image'        => str_slug($ds['model']) . '.png',
                'level'        => null
            ]);

            $service = \App\Service::firstOrCreate([
                'name' => $ds['service']
            ]);

            $service->devices()->attach($device, ['price' => $ds['price'], 'upc' => $ds['upc']]);
        }
    }
}
