<div class="tradingview-widget-container card__body h-full">
	<div class="tradingview-widget-container__widget"></div>
	<script type="text/javascript"
		src="https://s3.tradingview.com/external-embedding/embed-widget-market-overview.js"
		async>
			{
				"colorTheme": "dark",
				"dateRange": "12M",
				"showChart": false,
				"locale": "{{ app()->getLocale() }}",
				"width": "100%",
				"height": "100%",
				"largeChartUrl": "",
				"isTransparent": true,
				"showSymbolLogo": false,
				"tabs": [
					{
						"title": "Криптовалюты",
						"symbols": [
							{
								"s": "BITSTAMP:BTCUSD",
								"d": "BTCUSD"
							},
							{
								"s": "COINBASE:ETHUSD",
								"d": "ETHUSD"
							},
							{
								"s": "COINBASE:LTCUSD",
								"d": "LTCUSD"
							},
							{
								"s": "BITTREX:BTCUSDT",
								"d": "BTCUSDT"
							},
							{
								"s": "CURRENCYCOM:XRPUSD",
								"d": "XRPUSD"
							}
						]
					}
				]
			}
	</script>
</div>