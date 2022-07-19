import React, { useState } from "react";
import { Link, useHistory } from "react-router-dom";
import "../../../assets/frontend/css/login-signup.css";
import login from "../../../assets/frontend/img/login.svg";
import axios from "axios";
import swal from "sweetalert";
import Navbar from "../../../layouts/frontend/Navbar";
import Footer from "../../../layouts/frontend/Footer";

function Register() {
  const history = useHistory();

  // registerInput: get value from user and assign in registerInput
  const [registerInput, setRegister] = useState({
    name: "",
    email: "",
    password: "",
    error_list: [],
  });

  const handleInput = (e) => {
    e.persist();
    // ...registerInput: Lấy all giá trị user đã nhập
    setRegister({ ...registerInput, [e.target.name]: e.target.value });
  };

  const registerSubmit = (e) => {
    e.preventDefault();
    // Lấy tất cả dữ liệu mỗi khi submit
    const data = {
      name: registerInput.name,
      email: registerInput.email,
      password: registerInput.password,
    };
    axios.get("/sanctum/csrf-cookie").then((response) => {
      axios.post(`/api/register`, data).then((res) => {
        if (res.data.status === 200) {
          // Lưu trữ data trong localStorage
          localStorage.setItem("auth_token", res.data.token);
          localStorage.setItem("auth_name", res.data.username);
          // notification message success
          swal("Success", res.data.message, "success");
          history.push("/");
        } else {
          // trả về lỗi khi người dùng input
          setRegister({
            ...registerInput,
            error_list: res.data.validation_errors,
          });
        }
      });
    });
  };

  return (
    <div>
      <Navbar />
      <section className="login py-5 bg-primary">
        <div className="container">
          <div className="row1 g-0">
            <div className="col-lg-5 text-center">
              <img src={login} className="img-fluid" alt="" />
              <h3>Sign In Right Here </h3>
              <p>Booking Now</p>
              <Link
                to="/login"
                className="btn btn-outline-primary rounded"
                id="sign-up-btn"
              >
                Sign in
              </Link>
            </div>
            <div className="col-lg-7 text-center py-5">
              <h1 className="animate__animated animate__rubberBand">
                Join with us
              </h1>
              <form onSubmit={registerSubmit}>
                <div className="form-row py-auto">
                  <div className="offset-1 col-lg-10">
                    <i
                      className="fas fa-user"
                      style={{ marginRight: "10px" }}
                    ></i>
                    <input
                      type="text"
                      name="name"
                      placeholder="Your Name"
                      className="inp px-3"
                      onChange={handleInput}
                      value={registerInput.name}
                    />
                    <br />
                    <span className="text-danger">
                      {registerInput.error_list.name}
                    </span>
                  </div>
                </div>

                <div className="form-row py-auto">
                  <div className="offset-1 col-lg-10">
                    <i
                      className="fas fa-at"
                      style={{ marginRight: "10px" }}
                    ></i>
                    <input
                      type="email"
                      name="email"
                      placeholder="Your Email"
                      className="inp px-3"
                      onChange={handleInput}
                      value={registerInput.email}
                    />
                    <br />
                    <span className="text-danger">
                      {registerInput.error_list.email}
                    </span>
                  </div>
                </div>

                <div className="form-row py-auto">
                  <div className="offset-1 col-lg-10">
                    <i
                      className="fas fa-lock"
                      style={{ marginRight: "10px" }}
                    ></i>
                    <input
                      className="inp px-3"
                      type="password"
                      placeholder="Password"
                      name="password"
                      onChange={handleInput}
                      value={registerInput.password}
                    />
                    <br />
                    <span className="text-danger">
                      {registerInput.error_list.password}
                    </span>
                  </div>
                </div>

                {/* <div className="form-row py-auto">
                  <div className="offset-1 col-lg-10">
                    <i
                      className="fas fa-lock"
                      style={{ marginRight: "10px" }}
                    ></i>
                    <input
                      className="inp px-3"
                      type="password"
                      placeholder="Confirm Password"
                      name="password_confirmation"
                    />
                    <span className="text-danger">
                      {registerInput.error_list.password_confirmation}
                    </span>
                  </div>
                </div> */}

                <div className="form-row py-3">
                  <div className="offset-1 col-lg-10">
                    <button type="submit" className="btn1">
                      Register
                    </button>
                  </div>
                </div>
              </form>
              <p>Or Login with</p>
              <span>
                <i className="fab fa-facebook"></i>
              </span>
              <span>
                <i className="fab fa-google-plus"></i>
              </span>
            </div>
          </div>
        </div>
      </section>
      <Footer />
    </div>
  );
}

export default Register;
