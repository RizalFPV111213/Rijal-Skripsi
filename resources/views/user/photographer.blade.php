@extends('layouts.user')

@section('header')
    <style>
        #hero{
            background: url('{{asset('user/images/contact.png')}}') top center;
            background-repeat: no-repeat;
            width:100%;
            background-size:cover;
        }
    </style>    
@endsection

@section('hero')
    <h1>Photography Digita.id</h1>
    <h2></h2>
@endsection

@section('content')
<div class="service-photographer">
    <!-- Service Section -->
    <div class="service-section py-5">
        <div class="container">
            <h2 class="text-center mb-5">Layanan Photography Kami</h2>
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title">Wedding Photography</h5>
                            <p class="card-text">Mengabadikan momen spesial pernikahan Anda dengan sentuhan profesional</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title">Product Photography</h5>
                            <p class="card-text">Foto produk berkualitas tinggi untuk kebutuhan bisnis dan e-commerce</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title">Event Photography</h5>
                            <p class="card-text">Dokumentasi acara dan event dengan hasil yang memuaskan</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Price Section -->
    <div class="price-section py-5 bg-light">
        <div class="container">
            <h2 class="text-center mb-5">Paket Harga</h2>
            <div class="row">
                @foreach($packages as $package)
                <div class="col-lg-4 col-md-6">
                    <div class="card">
                        <div class="card-body text-center">
                            <h4>{{ $package->title }}</h4>
                            <h3 class="text-success">Rp {{ number_format($package->price, 0, ',', '.') }}</h3>
                            <p>{{ $package->description }}</p>
                            <button type="button" class="btn btn-success pilih-paket" 
                                    data-package="{{ Str::lower($package->title) }}">Pilih Paket</button>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="modal fade" id="bookingModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="bookingModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="bookingModalLabel">Booking Now</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="bookingForm">
                        <div class="mb-3">
                            <label class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">No. Telepon</label>
                            <input type="tel" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Paket Yang Dipilih</label>
                            <select class="form-select" id="selectedPackage" name="package_id" required>
                                <option value="">Pilih Paket</option>
                                @foreach($packages as $package)
                                    <option value="{{ $package->id }}">{{ $package->title }} - Rp {{ number_format($package->price, 0, ',', '.') }}
                                        {{ $package->description }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Metode Pembayaran</label>
                            <select class="form-select" name="bank_id" required>
                                <option value="">Pilih Bank</option>
                                @foreach($banks as $bank)
                                    <option value="{{ $bank->id }}">{{ $bank->name }} - {{ $bank->number }} ({{ $bank->account_holder }})</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tanggal Booking</label>
                            <input type="date" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Pesan</label>
                            <textarea class="form-control" rows="3"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="button" class="btn btn-success">Booking</button>
                </div>
            </div>
        </div>
    </div>
</div>



<!-- Update the "Pilih Paket" buttons to trigger the modal -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const pilihPaketButtons = document.querySelectorAll('.btn-success');
    pilihPaketButtons.forEach(button => {
        button.setAttribute('data-bs-toggle', 'modal');
        button.setAttribute('data-bs-target', '#bookingModal');
        button.addEventListener('click', function() {
            const packageTitle = this.closest('.card-body').querySelector('.card-title').textContent;
            document.getElementById('selectedPackage').value = packageTitle;
        });
    });
});
</script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const modal = document.getElementById('bookingModal');
    const form = document.getElementById('bookingForm');
    
    // Reset form when modal is closed
    modal.addEventListener('hidden.bs.modal', function () {
        form.reset();
        document.getElementById('selectedPackage').value = '';
        // Remove any lingering backdrop
        const backdrop = document.querySelector('.modal-backdrop');
        if (backdrop) {
            backdrop.remove();
        }
        // Ensure body classes are cleaned up
        document.body.classList.remove('modal-open');
        document.body.style.overflow = '';
        document.body.style.paddingRight = '';
    });
    
    // Existing event listeners for buttons remain unchanged
    const buttons = document.querySelectorAll('.pilih-paket');
    buttons.forEach(button => {
        button.addEventListener('click', function() {
            const packageType = this.closest('.card-body').querySelector('h4').textContent.trim().toLowerCase();
            const select = document.getElementById('selectedPackage');
            
            for(let option of select.options) {
                if(option.value === packageType.split(' ')[0]) {
                    option.selected = true;
                    break;
                }
            }
            
            const modal = new bootstrap.Modal(document.getElementById('bookingModal'));
            modal.show();
        });
    });
});
</script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('submitBooking').addEventListener('click', function(e) {
        e.preventDefault();
        
        const form = document.getElementById('bookingForm');
        const formData = new FormData(form);
        
        // Disable submit button to prevent double submission
        this.disabled = true;
        
        fetch('/booking/store', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            },
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('Booking berhasil!');
                window.location.href = '/booking/success/' + data.booking_id;
            } else {
                alert('Error: ' + data.message);
                this.disabled = false;
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Terjadi kesalahan. Silakan coba lagi.');
            this.disabled = false;
        });
    });
});
</script>
<style>
.card-price {
    font-size: 1.5rem;
    font-weight: bold;
    color: #28a745;
}
.hero-section {
    min-height: 400px;
    display: flex;
    align-items: center;
}
.form-select {
    width: 100%;
    padding: 0.375rem 0.75rem;
    font-size: 1rem;
    font-weight: 400;
    line-height: 1.5;
    color: #212529;
    background-color: #fff;
    border: 1px solid #ced4da;
    border-radius: 0.25rem;
    transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
}

.form-select:focus {
    border-color: #86b7fe;
    outline: 0;
    box-shadow: 0 0 0 0.25rem rgba(13,110,253,.25);
}
.portfolio-card {
    transition: transform 0.3s ease;
    height: 100%;
}

.portfolio-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
}

.portfolio-card img {
    height: 250px;
    object-fit: cover;
}
</style>
@endsection