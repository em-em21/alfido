@extends('layouts.admin')
@section('page-title', 'Пополнения и списания | '.config('app.name'))
@section('title')
    Создать транзакции для 
    <span>
        {{$users->surname}} {{$users->name}}
    </span>
@endsection

@push('styles')
  <link rel="stylesheet" href="https://cdn.rawgit.com/t4t5/sweetalert/v0.2.0/lib/sweet-alert.css">
@endpush

@section('admin-content')
<div class="container-fluid">
    @include('includes.global.alerts')

    <div class="payments-trans__wrapper">
        {{-- User's Income --}}
        <div class="card payments-trans__wrapper--card col-md-5 collapsed-card">
            <div class="card-header" data-card-widget="collapse">
                <h4 class="card-title">Пополнение баланса</h4>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-plus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <form action="/payments/{{$users->id}}" method="POST" class="temp-class">
                    @csrf
                    @method('POST')
                    <div class="form-group">
                        <label class="ad-label">Пополнить баланс</label>
                        <input type="text" class="form-control" name="income_amount">
                    </div>
        
                    <div class="form-group">
                        <label class="ad-label">Источник</label>
                        @if(isset($name))
                        <input type="text" class="form-control" placeholder="Напишите причину пополнения"
                            name="income_source">
                        @else
                        <input type="text" class="form-control" value="Пополнение BTC кошелька"
                            name="income_source">
                        @endif
                        <small style="color:teal;"><em>По дефолту: Пополнение BTC кошелька</em></small>
                    </div>
        
                    <input name="user_id" type="hidden" value="{{$users->id}}">
        
                    <button type="submit" class="btn btn-success">Отправить</button>
                </form>
            </div>
        </div>
        
        {{-- User's Bonus Income --}}
        <div class="card payments-trans__wrapper--card col-md-5 collapsed-card">
            <div class="card-header" data-card-widget="collapse">
                <h4 class="card-title">Бонусное пополнение</h4>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-plus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <form action="/payments/{{$users->id}}" method="POST">
                    @csrf
                    @method('POST')
                    <div class="form-group">
                        <label class="ad-label">Бонусный баланс</label>
                        <input type="text" class="form-control" name="bonus_amount">
                    </div>
        
                    <div class="form-group">
                        <label class="ad-label">Источник</label>
                        <input type="text" class="form-control" placeholder="Напишите причину бонуса"
                            name="bonus_source">
                    </div>
        
                    <input name="user_id" type="hidden" value="{{$users->id}}">
        
                    <button type="submit" class="btn btn-primary btn-success">Пополнить</button>
                </form>
            </div>
        </div>
        
        {{-- User's Outcome --}}
        <div class="card payments-trans__wrapper--card col-md-5 collapsed-card">
            <div class="card-header" data-card-widget="collapse">
                <h4 class="card-title">Списание баланса</h4>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-plus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <form action="/payments/{{$users->id}}" method="POST">
                    @csrf
                    @method('POST')
                    <div class="form-group">
                        <label class="ad-label">Списать баланс</label>
                        <input type="text" class="form-control" name="outcome_amount">
                    </div>
        
                    <div class="form-group">
                        <label class="ad-label">Источник</label>
                        <input type="text" class="form-control" placeholder="Напишите причину списания"
                            name="outcome_source">
                    </div>
        
                    <input name="user_id" type="hidden" value="{{$users->id}}">
        
                    <button type="submit" class="btn btn-primary btn-danger">Списать</button>
                </form>
            </div>
        </div>
    </div>
    
    <div class="payments-history_wrapper">
        {{-- <h4 class="page-title">
            История транзакций пользователя
            <span class="font-weight-normal">
                {{$users->surname}} {{$users->name}}
            </span>
        </h4> --}}
        <div class="payment_tables">
            <div class="payment_tables--item">
                <h5>Все пополнения пользователя</h5>
                <div class="table-wrapper_new">
                    <table id="income-table" class="table table-striped">
                        <thead>
                            <tr>
                                <th>Сумма (BTC)</th>
                                <th>Дата</th>
                                <th>Источник</th>
                                <th>Действия</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($transactions as $trans)
                            @if(!empty($trans->income_amount) || !empty($trans->bonus_amount))
                            <tr>
                                @if(!empty($trans->income_amount))
                                <td>{{$trans->income_amount}}</td>
                                @else
                                <td>{{$trans->bonus_amount}}</td>
                                @endif
        
                                <td>{{$trans->created_at}}</td>
        
                                @if(!empty($trans->income_source))
                                <td class="in-reason">{{$trans->income_source}}</td>
                                @else
                                <td class="in-reason">{{$trans->bonus_source}}</td>
                                @endif
        
                                <td>
                                    <form action="/payments/delete/{{$trans->id}}" method="POST"
                                        class="deleteForm" data-flag="0">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger p-0">
                                            <i class="fas fa-trash ad"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="payment_tables--item">
                <h5>Все списания пользователя</h5>
                <div class="table-wrapper_new">
                    <table id="outcome-table" class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Сумма (BTC)</th>
                                <th>Дата</th>
                                <th>Источник</th>
                                <th>Действия</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($transactions as $trans)
                            @if(!empty($trans->outcome_amount))
                            <tr>
                                <td>{{$trans->id}}</td>
                                <td>{{$trans->outcome_amount}}</td>
                                <td>{{$trans->created_at}}</td>
                                <td class="out-reason">{{$trans->outcome_source}}</td>
                                <td>
                                    <form action="/payments/delete/{{$trans->id}}" method="POST"
                                        class="deleteForm" data-flag="0">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger p-0">
                                            <i class="fas fa-trash ad"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
{{-- Sweet Alert --}}
<script src="https://cdn.rawgit.com/t4t5/sweetalert/v0.2.0/lib/sweet-alert.min.js"></script>
{{-- Etc --}}
<script type="text/javascript">

    let form = $('.temp-class');

    form.on('submit', function(e) {
      let amount = $('input[name="income_amount"]');
      let value = amount.val();
      parseFloat(value);
      
      let secAmount = $('input[name="bonus_amount"]');
      let secValue = secAmount.val();
      parseFloat(secValue);

      let outcomeAmount = $('input[name="outcome_amount"]');
      let outcomeValue = outcomeAmount.val();
      parseFloat(outcomeValue);
    });
    
    let deleteForm = $('.deleteForm');

    deleteForm.on('submit', function(e) {
      
      form = $(this);
      flag = form.attr('data-flag');

        if (flag == 0) {
          e.preventDefault();
        }

        swal({
            title: "Удалить транзакцию?",
            text: "",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: '#DD6B55',
            confirmButtonText: 'Удалить',
            cancelButtonText: "Отменить",
            closeOnConfirm: true
          },
          function(isConfirm){
            if (isConfirm) {
              form.attr('data-flag', '1');
              form.submit();
            }
          });

      return true;

    });

    const incomeTable = $('#income-table').DataTable({
        "responsive": true,
      "language": {
          "emptyTable": "На данный момент записей нет.",
            "lengthMenu": "Показать _MENU_ записей",
            "zeroRecords": "Ничего не найдено",
            "info": "Страница _PAGE_ из _PAGES_",
            "infoEmpty": "Записей нет",
            "infoFiltered": "(filtered from _MAX_ total records)",
            "search": "Поиск:",
              "paginate": {
                "previous": "Пред.",
                "next": "След."
              }
        }
    });

    const outcomeTable = $('#outcome-table').DataTable({
        "responsive": true,
      "language": {
          "emptyTable": "На данный момент записей нет.",
            "lengthMenu": "Показать _MENU_ записей",
            "zeroRecords": "Ничего не найдено",
            "info": "Страница _PAGE_ из _PAGES_",
            "infoEmpty": "Записей нет",
            "infoFiltered": "(filtered from _MAX_ total records)",
            "search": "Поиск:",
              "paginate": {
                "previous": "Пред.",
                "next": "След."
              }
        }
    });

</script>
@endpush