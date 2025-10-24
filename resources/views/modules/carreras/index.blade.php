@extends('layouts.main')

@section('title', 'Careers')

@section('content')
<div class="container">
    <h1 class="mb-4">Career List</h1>

    <div class="mb-3">
        <a href="{{ route('carreras.create') }}" class="btn btn-primary">
            <i class="fa-solid fa-plus-circle"></i> New Career
        </a>
    </div>

    <div class="card card-custom">
        <div class="card-header">
            <h5 class="mb-0">Registered Careers</h5>
        </div>
        <div class="card-body">
            @if($careers->isEmpty())
                <p class="text-muted">No careers registered yet.</p>
            @else
                <div class="table-responsive">
                    <table class="table table-hover table-bordered align-middle" id="careersTable">
                        <thead class="table-dark">
                            <tr>
                                <th>ID</th>
                                <th>Career Name</th>
                                <th>Duration (Years)</th>
                                <th>Modality</th>
                                <th>Career Number</th>
                                <th>Faculty</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($careers as $career)
                                <tr>
                                    <td>{{ $career->career_id }}</td>
                                    <td>{{ $career->career_name }}</td>
                                    <td>{{ $career->duration_years }}</td>
                                    <td>{{ ucfirst($career->modality) }}</td>
                                    <td>{{ $career->carrer_number }}</td>
                                    <td>
                                        @if($career->faculty)
                                            {{ $career->faculty->faculty_name }}
                                        @else
                                            <span class="text-muted">Not assigned</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('carreras.edit', $career->career_id) }}" class="btn btn-sm btn-warning">
                                            <i class="fa-solid fa-pen-to-square"></i> Edit
                                        </a>

                                        <form action="{{ route('carreras.destroy', $career->career_id) }}" method="POST"
                                            style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">
                                                <i class="fa-solid fa-trash"></i> Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        $('#careersTable').DataTable({
            language: {
                decimal: "",
                emptyTable: "No data available in the table",
                info: "Showing _START_ to _END_ of _TOTAL_ entries",
                infoEmpty: "Showing 0 to 0 of 0 entries",
                infoFiltered: "(filtered from _MAX_ total entries)",
                lengthMenu: "Show _MENU_ entries",
                loadingRecords: "Loading...",
                processing: "Processing...",
                search: "Search:",
                zeroRecords: "No matching records found",
                paginate: {
                    first: "First",
                    last: "Last",
                    next: "Next",
                    previous: "Previous"
                },
                aria: {
                    sortAscending: ": activate to sort column ascending",
                    sortDescending: ": activate to sort column descending"
                }
            }
        });
    });
</script>

@endsection

