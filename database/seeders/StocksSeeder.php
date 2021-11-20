<?php

namespace Database\Seeders;

use App\Models\Stock;
use Illuminate\Database\Seeder;

class StocksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $stocks = [
			// Cryptocurrency [market === 0]
			// ! changed binanceus to currencycom
			['name' => 'Bitcoin', 'alias' => 'BTC',  'market' => 0],
			['name' => 'Ethereum', 'alias' => 'ETH',  'market' => 0],
			['name' => 'Tether', 'alias' => 'USDT',  'market' => 0],
			['name' => 'Litecoin', 'alias' => 'LTC',  'market' => 0],
			['name' => 'Bitcoin Cash', 'alias' => 'BCH',  'market' => 0],
			['name' => 'Ripple', 'alias' => 'XRP',  'market' => 0],
			['name' => 'Chainlink', 'alias' => 'LINK',  'market' => 0],
			['name' => 'Dash', 'alias' => 'DASH',  'market' => 0],
			['name' => 'Dogecoin', 'alias' => 'DOGE',  'market' => 0],
			['name' => 'Compound', 'alias' => 'COMP',  'market' => 0],
			['name' => 'Uniswap', 'alias' => 'UNI',  'market' => 0],
			// * unavailable trades start
			// ['name' => 'BNB', 'alias' => 'BNB', 'market' => 0],
			// ['name' => 'Cardano', 'alias' => 'ADA',  'market' => 0],
			// ['name' => 'Harmony', 'alias' => 'ONE',  'market' => 0],
			// ['name' => 'Matic Network', 'alias' => 'MATIC', 'market' => 0],
			// ['name' => 'Stellar Lumens', 'alias' => 'XLM',  'market' => 0],
			// ['name' => 'QTUM', 'alias' => 'QTUM',  'market' => 0],
			// ['name' => 'Storj', 'alias' => 'STORJ',  'market' => 0],
			// ['name' => 'Decentraland', 'alias' => 'MANA',  'market' => 0],
			// ['name' => 'Neo', 'alias' => 'NEO',  'market' => 0],
			// ['name' => 'Algorand', 'alias' => 'ALGO',  'market' => 0],
			// ['name' => 'Tezos', 'alias' => 'XTZ',  'market' => 0],
			// ['name' => 'VeChain', 'alias' => 'VET',  'market' => 0],
			// ['name' => 'DAI', 'alias' => 'DAI',  'market' => 0],
			// ['name' => 'Ravencoin', 'alias' => 'RVN',  'market' => 0],
			// ['name' => 'Cosmos', 'alias' => 'ATOM',  'market' => 0],
			// ['name' => 'Zilliqa', 'alias' => 'ZIL',  'market' => 0],
			// * unavailable trades end

			// Forex Stocks [market === 1]
			['name' => 'Apple', 'alias' => 'AAPL', 'market' => 1],
			['name' => 'Tesla', 'alias' => 'TSLA', 'market' => 1],
			['name' => 'Amazon', 'alias' => 'AMZN', 'market' => 1],
			['name' => 'Lands End', 'alias' => 'LE', 'market' => 1],
			['name' => 'AMD', 'alias' => 'AMD', 'market' => 1],
			['name' => 'Microsoft', 'alias' => 'MSFT', 'market' => 1],
			['name' => 'Alphabet A', 'alias' => 'GOOGL', 'market' => 1],
			['name' => 'Facebook', 'alias' => 'FB', 'market' => 1],
			['name' => 'Nvidia', 'alias' => 'NVDA', 'market' => 1],
			['name' => 'Adobe', 'alias' => 'ADBE', 'market' => 1],
			['name' => 'PayPal', 'alias' => 'PYPL', 'market' => 1],
			['name' => 'Netflix', 'alias' => 'NFLX', 'market' => 1],
			['name' => 'Comcast', 'alias' => 'CMCSA', 'market' => 1],
			['name' => 'PepsiCo', 'alias' => 'PEP', 'market' => 1],
			['name' => 'Intel', 'alias' => 'INTC', 'market' => 1],
			['name' => 'Qualcomm', 'alias' => 'QCOM', 'market' => 1],
			['name' => 'Broadcom Inc', 'alias' => 'AVGO', 'market' => 1],
			['name' => 'Pinduoduo', 'alias' => 'PDD', 'market' => 1],
			['name' => 'Cisco', 'alias' => 'CSCO', 'market' => 1],
			['name' => 'T-Mobile US', 'alias' => 'TMUS', 'market' => 1],
			['name' => 'Costco', 'alias' => 'COST', 'market' => 1],
			['name' => 'Amgen', 'alias' => 'AMGN', 'market' => 1],
			['name' => 'AstraZeneca', 'alias' => 'AZN', 'market' => 1],
			['name' => 'JD', 'alias' => 'JD', 'market' => 1],
			['name' => 'Starbucks', 'alias' => 'SBUX', 'market' => 1],
			['name' => 'Sanofi', 'alias' => 'SNY', 'market' => 1],
			['name' => 'Zoom', 'alias' => 'ZM', 'market' => 1],
			['name' => 'Peloton', 'alias' => 'PTON', 'market' => 1],

			// Commodity Stocks [market === 2]
			['name' => 'SPDR Gold Trust', 'alias' => 'GLD', 'market' => 2],
			['name' => 'iShares Gold Trust', 'alias' => 'IAU', 'market' => 2],
			['name' => 'iShares Silver Trust', 'alias' => 'SLV', 'market' => 2],
			['name' => 'SPDR Gold MiniShares', 'alias' => 'GLDM', 'market' => 2],
			['name' => 'U.S. Oil Fund', 'alias' => 'USO', 'market' => 2],
			['name' => 'ProShares K-1', 'alias' => 'OILK', 'market' => 2],
			['name' => 'Aberdeen Gold', 'alias' => 'SGOL', 'market' => 2],
			['name' => 'PowerShares DB', 'alias' => 'DBC', 'market' => 2],
			['name' => 'Aberdeen Platinum', 'alias' => 'PPLT', 'market' => 2],
			['name' => 'ProShares Crude Oil', 'alias' => 'UCO', 'market' => 2],
			['name' => 'Aberdeen Silver', 'alias' => 'SIVR', 'market' => 2],
			['name' => 'iShares S&P', 'alias' => 'GSG', 'market' => 2],
			['name' => 'Aberdeen Metal', 'alias' => 'GLTR', 'market' => 2],
			['name' => 'ProShares Ultra Silver', 'alias' => 'AGQ', 'market' => 2],
			['name' => 'Invesco DB', 'alias' => 'DBA', 'market' => 2],
			['name' => 'Goldman ETF', 'alias' => 'AAAU', 'market' => 2],
			['name' => 'Barclays', 'alias' => 'DJP', 'market' => 2],
			['name' => 'Invesco Oil', 'alias' => 'DBO', 'market' => 2],
			['name' => 'U.S. Natural Gas', 'alias' => 'UNG', 'market' => 2],
			['name' => 'VanEck Merk', 'alias' => 'OUNZ', 'market' => 2],
			['name' => 'Aberdeen Palladium', 'alias' => 'PALL', 'market' => 2],
			['name' => 'U.S. Brent Oil', 'alias' => 'BNO', 'market' => 2],
			['name' => 'Aberdeen Std Blm', 'alias' => 'BCI', 'market' => 2],
		];

		foreach ($stocks as $stock) Stock::create($stock);
    }
}
