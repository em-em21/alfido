<div class="tradingview-widget-container">
    <div class="tradingview-widget-container__widget"></div>
    <script type="text/javascript"
        src="https://s3.tradingview.com/external-embedding/embed-widget-ticker-tape.js" async>
        {
            "symbols": [
                {
                "proName": "BITSTAMP:BTCUSD",
                "title": "BTC/USD"
                },
                {
                "proName": "BITSTAMP:ETHUSD",
                "title": "ETH/USD"
                },
                {
                "description": "USDT",
                "proName": "CRYPTOCAP:USDT"
                },
                {
                "description": "LTC/USD",
                "proName": "COINBASE:LTCUSD"
                },
                {
                "description": "GLD",
                "proName": "AMEX:GLD"
                },
                {
                "description": "MSFT",
                "proName": "NASDAQ:MSFT"
                },
                {
                "description": "AAPL",
                "proName": "NASDAQ:AAPL"
                }
            ],
            "showSymbolLogo": true,
            "colorTheme": "dark",
            "isTransparent": true,
            "displayMode": "regular",
            "locale": "{{ app()->getLocale() }}"
        }
    </script>
</div>