<div class="tradingview-widget-container card__body h-full">
	<div class="tradingview-widget-container__widget"></div>
	<script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-market-overview.js" async>
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
			"title": "Индексы",
			"symbols": [
			  {
				"s": "FOREXCOM:SPXUSD",
				"d": "S&P 500"
			  },
			  {
				"s": "FOREXCOM:NSXUSD",
				"d": "Nasdaq 100"
			  },
			  {
				"s": "FOREXCOM:DJI",
				"d": "Dow 30"
			  },
			  {
				"s": "INDEX:NKY",
				"d": "Nikkei 225"
			  },
			  {
				"s": "INDEX:DEU30",
				"d": "DAX Index"
			  },
			  {
				"s": "FOREXCOM:UKXGBP",
				"d": "FTSE 100"
			  }
			],
			"originalTitle": "Indices"
			}
		  ]
		}
	</script>
</div>