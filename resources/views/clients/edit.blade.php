@extends('layouts')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <!-- Header -->
            <div class="glass-card rounded-4 p-4 mb-4 slide-in position-relative overflow-hidden">
                <div class="d-flex align-items-center">
                    <div>
                        <h2 class="text-white fw-bold mb-1">Modifier le Client</h2>
                        <p class="text-white-50 mb-0">Mettez à jour les informations du client #{{ $client->id }}</p>
                    </div>
                </div>
            </div>

                    </div>

                    <!-- Buttons -->
                    <div class="d-flex gap-3 mt-5">
                        <button type="submit" class="btn-modern flex-grow-1 border-0">
                            Mettre à jour
                        </button>
                        <a href="{{ route('clients.index') }}" class="btn btn-outline-light rounded-pill px-4 py-2">
                            Retour
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection