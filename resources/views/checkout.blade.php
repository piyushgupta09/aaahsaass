@extends('layouts.app')

@section('content')

<form method="post" name="customerData" action="{{ route('checkout.process') }}">
    @csrf

    <table>
        <tr>
            <td>TID :</td>
            <td><input type="text" name="tid" id="tid" readonly value="{{ $datetime }}" /></td>
        </tr>
        <tr>
            <td>Merchant Id :</td>
            <td><input type="text" name="merchant_id" readonly value="{{ $merchantId }}" /></td>
        </tr>
        <tr>
            <td>Order Id :</td>
            <td><input type="text" name="order_id" value="123654789" /></td>
        </tr>
        <tr>
            <td>Amount :</td>
            <td><input type="text" name="amount" value="10.00" /></td>
        </tr>
        <tr>
            <td>Currency :</td>
            <td><input type="text" name="currency" value="INR" /></td>
        </tr>
        <tr>
            <td>Redirect URL :</td>
            <td><input type="text" name="redirect_url" value="{{ route('checkout.response') }}" />
            </td>
        </tr>
        <tr>
            <td>Cancel URL :</td>
            <td><input type="text" name="cancel_url" value="{{ route('checkout.response') }}" /></td>
        </tr>
        <tr>
            <td>Language :</td>
            <td><input type="text" name="language" value="EN" /></td>
        </tr>

    </table>

    <input type="submit" value="Proceed">

</form>

@endsection
