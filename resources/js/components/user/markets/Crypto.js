import axios from 'axios';
import ccxtpro from 'ccxt.pro';
import { runSpinner, stopSpinner } from './../LoadingSpinner';

export default function Crypto() {
  window.addEventListener('reindex-table', (spinner = true) => {
    if (spinner) {
      runSpinner();
    }

    setTimeout(() => {
      fetchPrices();

      if (spinner) {
        stopSpinner();
      }
    }, 2222);
  });

  /**
   * Constantly update deal profit for each deal,
   * so admin can see fresh data.
   * TODO: try with laravel queues if any bugs or cons
   *
   */
  function updateProfits(payload) {
    try {
      setInterval(() => {
        axios.post(`/user/update-profit`, {
          payload,
        });
      }, 5000);
    } catch (error) {
      // ...
    }
  }

  const fetchPrices = function () {
    const tableRows = document.querySelectorAll('#dealsTable tbody tr');
    const payload = {};

    // prettier-ignore
    tableRows.forEach(tr => {
			const dealID            = tr.getAttribute('data-id').trim(),
				  dealDest          = tr.querySelector('.deal__dest').innerText.trim(),
				  dealAlias         = tr.querySelector('.deal__als').innerText.trim(),
				  dealProfit        = tr.querySelector('.deal-profit__profit'),
				  dealInvestment    = parseFloat(tr.querySelector('.deal__inv').innerText.trim()),
				  priceWhenBought   = parseFloat(tr.getAttribute('data-pwb')),
				  dealProfitWrapper = tr.querySelector('.deal-profit')

			;(async function() {
				const exchange = new ccxtpro.currencycom({
					'enableRateLimit': true
				})

				while (true && tr.getAttribute('data-ico') == 0) {
					const result = await Promise.all([
						exchange.watchTicker(`${dealAlias}/USD`)
					])

					const currentPrice = result[0]['last']
					const buy = ((currentPrice * dealInvestment) / priceWhenBought).toFixed(2)
					const sell = ((priceWhenBought * dealInvestment) / currentPrice).toFixed(2)

					// update profit field & db with the new profit, so admin gets fresh data
					dealProfit.innerText = payload[dealID] = dealDest === 'Buy' ? buy : sell

					// give needed classes to profit wrapper to indicate profit || loss
					dealProfitWrapper.classList.add('bg-price')
					setTimeout(() => dealProfitWrapper.classList.remove('bg-price'), 150)

					if (
						(dealDest === 'Buy' && parseFloat(buy) > dealInvestment) ||
						(dealDest === 'Sell' && parseFloat(sell) > dealInvestment)
					) {
						dealProfitWrapper.classList.add('up')
						dealProfitWrapper.classList.remove('down')
					} else {
						dealProfitWrapper.classList.add('down')
						dealProfitWrapper.classList.remove('up')
					}
				}
			})()
		})

    updateProfits(payload);
  };

  fetchPrices();
}
