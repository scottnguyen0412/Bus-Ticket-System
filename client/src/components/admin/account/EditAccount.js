import React from "react";
import { Link } from "react-router-dom";
function Edit() {
  return (
    <div className="container-fluid px-4">
      <div className="card mt-4 shadow p-3 mb-5 bg-white rounded">
        <div className="card-header bg-white text-dark font-weight-bold">
          <h4>
            Edit Account
            <Link
              to="/admin/view-account"
              className="btn btn-outline-primary btn-sm float-end"
            >
              View Account
            </Link>
          </h4>
        </div>
        <div className="card-body">
          {/* Vì có gửi hình ảnh nên sẽ cần encType="multipart/form-data"*/}
          <form encType="multipart/form-data">
            <div className="form-group mb-3 font-weight-bold">
              <label>Name</label>
              <input
                type="text"
                name="name"
                className="form-control"
                placeholder="Input the name"
              />
              {/* <small className="text-danger">{errorlist.name}</small> */}
            </div>
            <div className="form-group mb-3 font-weight-bold">
              <label>Email</label>
              <input
                type="email"
                name="email"
                className="form-control"
                placeholder="Input the email"
              />
            </div>
            <div className="form-group mb-3 font-weight-bold">
              <label>Phone Number</label>
              <input
                type="number"
                name="phone"
                className="form-control"
                placeholder="Input the phone number"
              />
            </div>
            <div className="form-group mb-3 font-weight-bold">
              <label>Address</label>
              <input
                type="text"
                name="address"
                className="form-control"
                placeholder="Input the address"
              />
            </div>
            <div className="form-group mb-3 font-weight-bold">
              <label>Gender</label>
              <br />
              <input type="radio" name="gender" value="male" className="mx-2" />
              Male
              <input
                type="radio"
                name="gender"
                value="female"
                className="mx-2"
              />
              Female
              <input
                type="radio"
                name="gender"
                value="other"
                className="mx-2"
              />
              Other
            </div>
            <div className="form-group mb-3 font-weight-bold">
              <label>Date of Birth</label>
              <input
                type="date"
                className="form-control"
                name="date_of_birth"
              />
            </div>
            <div className="form-group mb-3 font-weight-bold">
              Role
              <select className="form-select">
                <option>Select User Roles</option>
                <option>1</option>
              </select>
              {/* <small className="text-danger">
                      {errorlist.category_id}
                    </small> */}
            </div>

            <div className="row">
              <div className="form-group mb-3 font-weight-bold">
                <label>Avatar</label>
                <input type="file" name="avatar" className="form-control" />
                {/* <img
                        src={`http://localhost:8000/${productInput.image}`}
                        width="50px"
                        alt={productInput.name}
                      /> */}
              </div>
              <button
                type="submit"
                className="btn btn-outline-primary px-4 mt-2"
              >
                Update Account
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  );
}

export default Edit;
