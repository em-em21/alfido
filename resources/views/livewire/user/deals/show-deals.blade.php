<div class="card">
  <div class="card__header">
    <div class="card__header--title">
      {{ __('Открытые сделки') }}
    </div>
  </div>

  <div class="card__body">
    {{-- pagination --}}
    <div class="flex sm:flex-row justify-between items-center">
      <div>
        {{ $deals->links('includes.user.datatable.pagination') }}
      </div>
    </div>

    {{-- Table --}}
    <div
      class="w-full inline-block shadow overflow-hidden border border-gray-700 rounded overflow-x-auto">
      <table id="dealsTable" class="min-w-full">
        <thead>
          <tr class="bg-slightly-lighter">
            <th class="w-1/6 border-b border-gray-700">
              <div class="w-full flex items-center justify-between px-5 py-2 text-gray-200 font-normal">
                <span>Акция</span>
              </div>
            </th>

            <th class="w-1/6 border-b border-gray-700">
              <div class="w-full flex items-center justify-between px-5 py-2 text-gray-200 font-normal">
                <span>Профит (USD)</span>
              </div>
            </th>

            <th class="w-1/6 border-b border-gray-700">
              <div class="w-full flex items-center justify-between px-5 py-2 text-gray-200 font-normal">
                <span>Направление</span>
              </div>
            </th>

            <th class="w-1/6 border-b border-gray-700">
              <div class="w-full flex items-center justify-between px-5 py-2 text-gray-200 font-normal">
                <span>Инвестиция</span>
              </div>
            </th>

            <th class="w-1/6 border-b border-gray-700">
              <div class="w-full flex items-center justify-between px-5 py-2 text-gray-200 font-normal">
                <span>Дата</span>
              </div>
            </th>

            <th class="w-1/6 border-b border-gray-700">
              <div class="w-full flex items-center justify-between px-5 py-2 text-gray-200 font-normal">
                <span>Действия</span>
              </div>
            </th>
          </tr>
        </thead>

        <tbody>
          @if ($deals->total())
            @foreach ($deals as $deal)
              <tr wire:key="{{ $loop->index }}" class="border-b border-gray-700" data-pwb="{{ $deal->price }}"
                data-id="{{ $deal->id }}" data-ico="{{ $deal->is_ico }}">
                <td>
                  <div class="px-5 py-2 flex flex-col">
                    <p class="text-gray-500">
                      {{ !$deal->market ? 'Криптовалютный' : ($deal->market === 1 ? 'Фондовый' : 'Товарно-сырьевой') }}
                    </p>
                    <p class="text-gray-200">
                      {{ $deal->stock_naming }}
                      (<span class="deal__als">{{ $deal->stock_alias }}</span>)
                    </p>
                  </div>
                </td>
                <td>
                  <div class="px-5 py-2 flex items-center">
                    <div class="inline-flex items-center p-1 deal-profit">
                      {{-- Profit --}}
                      <span class="text-white deal-profit__profit p-1 pr-0">
                        {{ $deal->profit }}
                      </span>

                      {{-- Profit Indicator Arrows --}}
                      <svg class="w-4 h-3.5 deal-profit__up hidden" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor" style="margin-bottom: 2px;">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M8 7l4-4m0 0l4 4m-4-4v18" />
                      </svg>

                      <svg class="w-4 h-3.5 deal-profit__down hidden" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor" style="margin-bottom: 2px;">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M16 17l-4 4m0 0l-4-4m4 4V3" />
                      </svg>
                    </div>
                  </div>
                </td>
                <td>
                  <div class="px-5 py-2 flex items-center relative">
                    <span class="mr-2 {{ $deal->dest ? 'text-green-500' : 'text-red-500' }} deal__dest">
                      {{ $deal->dest ? 'Buy' : 'Sell' }}
                    </span>
                  </div>
                </td>
                <td>
                  <div class="px-5 py-2 flex items-center">
                    <span class="mr-1 nunito text-white">&#36;</span>

                    <span class="text-white deal__inv">
                      {{ $deal->investment }}
                    </span>
                  </div>
                </td>
                <td style="min-width: 12rem;">
                  <div class="p-5">
                    <span class="text-gray-200 text-center text-sm">
                      {{ App\Helpers\Utils::getDate($deal->created_at) }}
                    </span>
                  </div>
                </td>
                <td>
                  <div class="p-5">
                    <button
                      wire:click="confirmClose({{ $deal->id }}, event.target.closest('tr').querySelector('.deal-profit__profit').innerHTML.trim())"
                      class="shadow-md transition-opacity duration-75 py-1.5 px-3 rounded-2xl text-gray-50 bg-red-700 opacity-50 hover:opacity-100">
                      Закрыть
                    </button>
                  </div>
                </td>
              </tr>
            @endforeach
          @endif
        </tbody>
      </table>

      {{-- No opened deals --}}
      @if (!$deals->total())
        <div class="flex items-center justify-center w-full h-full">
          <p class="text-gray-400 text-center py-6">
            {{-- {{ $search !== '' ? 'По Вашему запросу ничего не найдено.' : 'На данный момент открытых сделок нет.' }} --}}
            {{ __('На данный момент открытых сделок нет.') }}
          </p>
        </div>
      @endif
    </div>
  </div>
</div>
