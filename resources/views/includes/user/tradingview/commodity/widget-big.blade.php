<div class="card custom-border h-full">
	<div class="card-body h-full block">
		<div class="tradingview-widget-container h-full w-full p-2 sm:p-2 md:p-3 lg:p-4 xl:p-5" id="tvchart"
		>
			<div id="watchlist" class="h-full"></div>
			<script type="text/javascript" src="https://s3.tradingview.com/tv.js"></script>
			<script type="text/javascript">
				new TradingView.widget({
					"symbol": "AMZN",
					"interval": "D",
					"timezone": "Europe/Moscow",
					"theme": "dark",
					"style": "10",
					"range": "1M",
					"locale": "{{ app()->getLocale() }}",
					"toolbar_bg": "#f1f3f6",
					"enable_publishing": false,
					"hide_side_toolbar": false,
					"allow_symbol_change": true,
					"container_id": "watchlist",
					"autosize": true,
					"withdateranges": true,
					"allow_symbol_change": true,
					"save_image": false,
					"watchlist": [
						"AAPL","ASML","TSLA","LE","AMD","MSFT","GOOG","GOOGL","FB","NVDA","ADBE","PYPL","NFLX","CMCSA","PEP","INTC","QCOM","AVGO","PDD","CSCO","TMUS","COST","TXN","CHTR","AMGN","AZN","JD","SBUX","SNY","ZM","MDLZ","MU","INTU","KIRK","PTON","ETSY","EXPI","BEEMW","CRDF","RIOT","GRVY","CELH","PLUG","ARCT","BEEM","ENPH","KSPN","AWH","PACB","LCAHW"
					]
				});
			</script>
		</div>
	</div>
</div>
