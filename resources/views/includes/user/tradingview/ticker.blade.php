<div class="tradingview-widget-container w-full mb-6">
	<div class="tradingview-widget-container__widget"></div>
	<script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-ticker-tape.js" async>
		{
			"symbols": [
			{
				"proName": "OANDA:SPX500USD",
				"title": "S&P 500"
			},
			{
				"proName": "OANDA:NAS100USD",
				"title": "NASDAQ 100"
			},
			{
				"proName": "FX_IDC:EURUSD",
				"title": "EUR/USD"
			},
			{
				"proName": "BITSTAMP:BTCUSD",
				"title": "BTC/USD"
			},
			{
				"proName": "BITSTAMP:ETHUSD",
				"title": "ETH/USD"
			}
		],
			"colorTheme": "dark",
			"isTransparent": true,
			"displayMode": "adaptive",
			"locale": "{{ app()->getLocale() }}"
		}
	</script>
</div>