@extends('layouts.app')

@section('content')
<div class="main-container">
    @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div class="background-accent"></div>
    <div class="container">
        <div class="row">
            <!-- Left Column - Welcome Section -->
            <div class="col-lg-4 col-md-12">
                <img class="government-logo" src="{{ asset('assets/logoGk.png') }}" alt="Logo Kabupaten Gunungkidul">
                <div class="welcome-section">
                    <img class="welcome-image" src="{{ asset('assets/iconGk.png') }}" alt="Welcome illustration">
                    <h1 class="welcome-title">Selamat Datang di Portal Buku Tamu Diskominfo Gunungkidul</h1>
                    <img>
                    <p class="welcome-description">Silakan lengkapi data kunjungan Anda untuk keperluan dokumentasi dan pelayanan.</p>
                </div>
            </div>

            <!-- Right Column-Form and Photo Section -->
            <div class="col-lg-8 col-md-12">
                <div class="elipse"></div>
                <div class="form-container">
                    <div class="row">
                        <!-- Form Column -->
                        <div class="col-lg-8 col-md-7">
                            <form method="POST" action="{{ route('buku-tamu.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama :</label>
                                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Contoh : Tisya">
                                </div>

                                <div class="mb-3">
                                    <label for="Dari" class="form-label">Dari :</label>
                                    <input type="text" class="form-control" id="Dari" name="Dari" placeholder="Contoh : PT. Handayani (Bapak Alex)">
                                </div>

                                <div class="mb-3">
                                    <label for="jam_datang" class="form-label">Jam Datang :</label>
                                    <input type="text" class="form-control" id="jam_datang" name="jam_datang" value="{{ now()->format('d/m/Y H:i') }}" readonly>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Alamat/asal :</label>
                                    <div class="row">
                                        <div class="col-12 mb-2">
                                            <select class="form-select" id="kabupaten" name="kabupaten">
                                                <option value="" disabled selected>Pilih Kabupaten</option>
                                                @foreach ($kabupaten as $kab)
                                                <option value="{{ $kab }}">{{ $kab }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-12 mb-2">
                                            <select class="form-select" id="kecamatan" name="kecamatan" disabled>
                                                <option value="" disabled selected>Pilih Kecamatan</option>
                                                @foreach ($kecamatan as $kec)
                                                <option value="{{ $kec }}">{{ $kec }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-12">
                                            <select class="form-select" id="desa" name="desa" disabled>
                                                <option value="" disabled selected>Pilih Desa</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="no_telp" class="form-label">Asal :</label>
                                    <input type="text" class="form-control" id="asal" name="asal" placeholder="Contoh: Gunungkidul, Yogyakarta">
                                </div>
                                <div class="mb-3">
                                    <label for="no_telp" class="form-label">No.telp :</label>
                                    <input type="text" class="form-control" id="no_telp" name="no_telp" placeholder="Contoh: 081390123163">
                                </div>

                                <div class="mb-3">
                                    <label for="jenis_kelamin" class="form-label">Jenis Kelamin :</label>
                                    <select class="form-select" id="jenis_kelamin" name="jenis_kelamin">
                                        <option value="" disabled selected>Pilih Jenis Kelamin</option>
                                        @foreach ($genders as $gender)
                                        <option value="{{ $gender }}">{{ $gender }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-4">
                                    <label for="keperluan" class="form-label">Keperluan :</label>
                                    <input type="text" class="form-control" id="keperluan" name="keperluan" placeholder="Contoh : Mengirim surat undangan">
                                </div>

                                <input type="hidden" id="foto_data" name="foto_data">

                                <div class="text-center">
                                    <button type="submit" class="btn btn-submit">
                                        <i class="fas fa-paper-plane me-2"></i>KIRIM
                                    </button>
                                </div>
                            </form>
                        </div>

                        <!-- Photo Column -->
                        <div class="col-lg-4 col-md-5">
                            <div class="photo-section">
                                <h5 class="text-center mb-3" style="color: #2E7D32;">Ambil Foto</h5>
                                <img id="photo-preview" class="photo-preview" src="data:image/svg+xml;charset=UTF-8,%3Csvg xmlns='http://www.w3.org/2000/svg' width='200' height='200' viewBox='0 0 200 200'%3E%3Crect width='200' height='200' fill='%23f8f9fa'/%3E%3Ccircle cx='100' cy='100' r='40' fill='%236c757d'/%3E%3Cpath d='M100 80 L100 120 M80 100 L120 100' stroke='white' stroke-width='3' stroke-linecap='round'/%3E%3C/svg%3E" alt="Photo preview">
                                <div class="text-center mt-3">
                                    <button type="button" class="btn btn-capture" id="open-camera">
                                        <i class="fas fa-camera me-2"></i>Capture
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Contact Section -->
    <div class="contact-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-auto">
                    <div class="contact-item">
                        <i class="fab fa-instagram"></i>
                        <span>kominfoGunungkidul</span>
                    </div>
                </div>
                <div class="col-auto">
                    <div class="contact-item">
                        <i class="fas fa-envelope"></i>
                        <span>kominfo@Gunungkidulkab.go.id</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Camera Modal -->
<div class="modal fade" id="camera-modal" tabindex="-1" aria-labelledby="cameraModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="cameraModalLabel">
                    <i class="fas fa-camera me-2"></i>Ambil Foto
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <video id="camera-view" class="camera-view" autoplay playsinline></video>
                <canvas id="camera-canvas" style="display:none;"></canvas>
            </div>
            <div class="modal-footer justify-content-center">
                <button type="button" class="btn btn-camera" id="capture-btn">
                    <i class="fas fa-camera me-2"></i>klik untuk ambil foto
                </button>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    // Update arrival time every second
    function updateTime() {
        const now = new Date();
        const options = {
            day: '2-digit',
            month: '2-digit',
            year: 'numeric',
            hour: '2-digit',
            minute: '2-digit',
            second: '2-digit',
            hour12: false
        };
        document.getElementById('jam_datang').value = now.toLocaleString('id-ID', options);
    }

    setInterval(updateTime, 1000);
    updateTime();

    // Address selection logic
    document.getElementById('kabupaten').addEventListener('change', function() {
        const kabupaten = this.value;
        const kecamatanSelect = document.getElementById('kecamatan');

        if (kabupaten) {
            kecamatanSelect.disabled = false;
        } else {
            kecamatanSelect.disabled = true;
            document.getElementById('desa').disabled = true;
        }
    });

    document.getElementById('kecamatan').addEventListener('change', function() {
        const kecamatan = this.value;
        const desaSelect = document.getElementById('desa');

        if (kecamatan) {
            // Fetch desa data via AJAX
            fetch(`/get-desa?kecamatan=${encodeURIComponent(kecamatan)}`)
                .then(response => response.json())
                .then(data => {
                    desaSelect.innerHTML = '<option value="" disabled selected>Pilih Desa</option>';

                    data.forEach(desa => {
                        const option = document.createElement('option');
                        option.value = desa;
                        option.textContent = desa;
                        desaSelect.appendChild(option);
                    });

                    desaSelect.disabled = false;
                });
        } else {
            desaSelect.disabled = true;
        }
    });

    // Camera functionality
    const cameraModal = new bootstrap.Modal(document.getElementById('camera-modal'));
    const openCameraBtn = document.getElementById('open-camera');
    const cameraView = document.getElementById('camera-view');
    const captureBtn = document.getElementById('capture-btn');
    const cameraCanvas = document.getElementById('camera-canvas');
    const photoPreview = document.getElementById('photo-preview');
    const fotoDataInput = document.getElementById('foto_data');

    let stream = null;

    openCameraBtn.addEventListener('click', async () => {
        try {
            cameraModal.show();
            stream = await navigator.mediaDevices.getUserMedia({
                video: {
                    facingMode: 'environment',
                    width: {
                        ideal: 1280
                    },
                    height: {
                        ideal: 720
                    }
                },
                audio: false
            });
            cameraView.srcObject = stream;
        } catch (err) {
            console.error("Error accessing camera: ", err);
            alert("Tidak dapat mengakses kamera. Pastikan Anda memberikan izin.");
        }
    });

    document.getElementById('camera-modal').addEventListener('hidden.bs.modal', function() {
        if (stream) {
            stream.getTracks().forEach(track => track.stop());
        }
    });

    captureBtn.addEventListener('click', () => {
        // Set canvas size to match video frame
        cameraCanvas.width = cameraView.videoWidth;
        cameraCanvas.height = cameraView.videoHeight;

        // Draw current video frame to canvas
        const ctx = cameraCanvas.getContext('2d');
        ctx.drawImage(cameraView, 0, 0, cameraCanvas.width, cameraCanvas.height);

        // Convert canvas to data URL and display as preview
        const imageData = cameraCanvas.toDataURL('image/png');
        photoPreview.src = imageData;
        fotoDataInput.value = imageData;

        // Close camera
        cameraModal.hide();
        if (stream) {
            stream.getTracks().forEach(track => track.stop());
        }
    });

    // Auto-close alert after 5 seconds
    setTimeout(() => {
        const alerts = document.querySelectorAll('.alert');
        alerts.forEach(alert => {
            const bsAlert = new bootstrap.Alert(alert);
            bsAlert.close();
        });
    }, 5000);
</script>
@endpush
@endsection