@extends('template')

@section('title')
    Carrinho de compras | E-Shop
@endsection

@section('content')
    <section id="cart_items">

        <div class="container">

            <div class="table-responsive cart_info">

                <table class="table table-condensed">

                    <thead>
                        <tr class="cart_menu">
                            <td class="image">Item</td>
                            <td class="description">Descrição</td>
                            <td class="price">Valor</td>
                            <td class="cart_quantity">Qtd</td>
                            <td class="">Total</td>
                            <td></td>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($cart->all() as $k=>$item)
                            <tr>
                                <td class="cart_product">
                                    <a href="{{ route('store.product', ['id' => $k]) }}">
                                        Img
                                    </a>
                                </td>
                                <td class="cart_description">
                                    <h3>
                                        <a href="{{ route('store.product', ['id' => $k]) }}">
                                            {{ $item['name'] }}
                                        </a>
                                    </h3>
                                    <p>Código: {{ $k }}</p>
                                </td>
                                <td class="cart_price">
                                    R$ {{ $item['price'] }}
                                </td>
                                <td class="cart_quantity">
                                    {{ $item['qtd'] }}
                                </td>
                                <td class="cart_total">
                                    <p class="cart_total_price">R$ {{ $item['price'] * $item['qtd'] }}</p>
                                </td>
                                <td class="cart_delete">
                                    <a href="{{ route('cart.destroy', ['id' => $k]) }}" class="cart_quantity_delete">Remover</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6">
                                    <p>Seu carrinho de compras está vazio.</p>
                                </td>
                            </tr>
                        @endforelse
                        <tr class="cart_menu">
                            <td colspan="6">
                                <div class="pull-right">
                                    <span>
                                        TOTAL: R$ {{ $cart->getTotal() }}
                                    </span>
                                    <a href="" class="btn btn-lg btn-success">Fechar pedido</a>
                                </div>
                            </td>
                        </tr>
                    </tbody>

                </table>

            </div>

        </div>

    </section>
@endsection