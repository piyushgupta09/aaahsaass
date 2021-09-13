@extends('layouts.app')

@section('content')


<form 
    method="post" 
    name="redirect" 
    action="https://test.ccavenue.com/transaction/transaction.do?command=initiateTransaction"> 
	@csrf
    <input type=hidden name=encRequest value={{ $encrypted_data }}>
    <input type=hidden name=access_code value={{ $access_code }}>
    <input type="submit" value="Submit">
</form>

<script>
    document.redirect.submit()
</script>

@endsection
