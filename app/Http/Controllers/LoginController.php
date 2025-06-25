<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
 public function showLoginForm()
 {
  return view('login');
 }
 public function login(Request $request)
 {
  $request->validate([
   'email'    => 'required|email',
   'password' => 'required|min:6',
  ]);
  $credentials = $request->only('email', 'password');

  if (! $token = auth()->attempt($credentials)) {
   return back()->withErrors(['Invalid credentials']);
  }

//   $url = 'http://127.0.0.1:8000/auth/external-login?token=' . $token;
//   return redirect($url);
  return redirect()->to('/dashboard');
 }

 public function logout()
 {
  auth()->logout();
  return redirect('http://127.0.0.1:8000/logout?redirect=http://ecommerce.test/login');
 }
}
