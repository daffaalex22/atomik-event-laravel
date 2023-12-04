@extends('layout')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <br>

            <h1>Beli Kupon</h1>

            <br>

            <form action="/kupon" method="POST">
                @csrf

                <div class="form-group">
                    <label for="name">Nama kamu siapa?</label><br />
                    <input 
                        type="text" 
                        name="name" 
                        id="name" 
                        required
                        class="form-control"
                        placeholder="Masukkan nama kamu disini!"
                    ><br />
                </div>

                <div class="form-group">
                    <label for="email">Email kamu apa?</label><br />
                    <input 
                        type="email" 
                        name="email" 
                        id="email" 
                        required
                        class="form-control"
                        placeholder="Masukkan alamat email kamu yang aktif!"
                        aria-describedby="emailHelp"
                    >
                    <small id="emailHelp" class="form-text text-muted">*Kode kupon yang kamu beli akan dikirim via email</small><br />
                    <br>
                </div>
                               
                <div class="form-group">
                    <label for="name">Jumlah kupon yang dibeli:</label><br />
                    <input 
                        type="number" 
                        name="coupon" 
                        id="coupon" 
                        required
                        class="form-control"
                        placeholder="Masukkan jumlah kupon yang akan kamu beli!"
                    ><br />
                </div>
                
                <input 
                    type="submit" 
                    value="Beli Kupon"
                    class="btn btn-primary"
                >
            </form>
        </div>
    </div>
</div>
@endsection