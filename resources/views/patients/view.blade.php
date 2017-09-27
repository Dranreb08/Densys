  <!-- Current Patients -->
          @if (count($patients) > 0)
              <div class="panel panel-default">
                  <div class="panel-heading">
                      Current Patients
                  </div>

                  <div class="panel-body">
                      <table class="table table-striped patient-table">
                          <thead>
                              <th>Patient</th>
                              <th>&nbsp;</th>
                          </thead>
                          <tbody>
                              @foreach ($patients as $patient)
                                  <tr>
                                      <td class="table-text"><div>{{ $patient->code }}</div></td>

                                      <!-- Patient Delete Button -->
                                      <td>
                                          <form action="{{url('patient/delete/' . $patient->id)}}" method="POST">
                                              {{ csrf_field() }}
                                              {{ method_field('DELETE') }}

                                              <button type="submit" id="delete-patient-{{ $patient->id }}" class="btn btn-danger">
                                                  <i class="glyphicon glyphicon-trash"></i> Delete
                                              </button>
                                          </form>
                                      </td>
                                  </tr>
                              @endforeach
                          </tbody>
                      </table>
                  </div>
              </div>
          @endif