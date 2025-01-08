@extends('layouts.app')

@section('title', 'Login')

@section('content')
<div class="d-flex justify-content-center align-items-center" style="height: 100vh; width: 101.95%; background-color: #007bff; margin: -25px; padding: 0;">
    <div class="card shadow p-4" style="width: 360px; background-color: #ffffff; border-radius: 8px;">
        <!-- Icon -->
        <div class="icon mx-auto mb-3" style="width: 35px; height: 40px; background-color: #007bff; clip-path: polygon(50% 0%, 100% 25%, 100% 75%, 50% 100%, 0% 75%, 0% 25%);"></div>

        <!-- Title -->
        <h2 class="text-center mb-4">Employee Data Master</h2>

        <!-- Login Form -->
        <form action="{{ route('login') }}" method="POST">
            @csrf

            <!-- Email Input -->
            <div class="mb-3">
                <label for="email" class="form-label">Email Address</label>
                <input type="email" name="email" id="email" placeholder="Enter Your Email"
                       class="form-control @error('email') is-invalid @enderror"
                       value="{{ old('email') }}" required>
                @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Password Input -->
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" id="password" placeholder="Enter Your Password"
                       class="form-control @error('password') is-invalid @enderror" required>
                @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Submit Button -->
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-box-arrow-in-right me-2"></i>Log In
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Fungsi untuk menghapus error ketika pengguna mulai mengetik ulang
    document.addEventListener('DOMContentLoaded', function () {
            const emailInput = document.getElementById('email');
            const passwordInput = document.getElementById('password');

            // Fungsi untuk menghapus error pada input
            const removeError = (inputId, errorMessageId) => {
                const input = document.getElementById(inputId);
                const errorMessage = document.getElementById(errorMessageId);

                input.addEventListener('input', function () {
                    if (input.classList.contains('is-invalid')) {
                        input.classList.remove('is-invalid');
                    }
                    if (errorMessage) {
                        errorMessage.style.display = 'none';
                    }
                    const errorIcon = input.parentElement.querySelector('.error-icon');
                    if (errorIcon) {
                        errorIcon.style.display = 'none';
                    }
                });
            };

            removeError('email', 'email-error');
            removeError('password', 'password-error');
        });

</script>
@endpush
