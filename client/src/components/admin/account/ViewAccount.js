import React, { useMemo } from "react";
import DataTable from "react-data-table-component";
import Export from "react-data-table-component";
import downloadCSV from "react-data-table-component";
import { Link } from "react-router-dom";

function ViewAccount() {
  const columns = [
    {
      name: "Name",
      selector: (row) => row.title,
    },
    {
      name: "Email",
      selector: (row) => row.year,
      sortable: true,
    },
    {
      name: "Phone",
      selector: (row) => row.category,
      sortable: true,
    },
    {
      name: "Avatar",
      selector: (row) => row.category,
      sortable: true,
    },
    {
      name: "Role",
      selector: (row) => row.category,
      sortable: true,
    },
    {
      name: "Action",
      cell: (row) => [
        <Link
          className="btn btn-sm btn-primary rounded-pill mx-2"
          title="Edit"
          to="/admin/edit-account"
        >
          <i className="fa fa-edit"></i>
        </Link>,
        <button title="Delete" className="btn btn-danger rounded-pill btn-sm">
          <i className="fas fa-trash"></i>
        </button>,
      ],
    },
  ];

  const data = [
    {
      id: 1,
      title: "Beetlejuice",
      year: "1988",
      category: "abc",
    },
    {
      id: 2,
      title: "Ghostbusters",
      year: "1984",
      category: "xyz",
    },
  ];

  return (
    <>
      <DataTable
        title="Show All Account"
        columns={columns}
        data={data}
        actions={
          <Link
            to="#"
            className="btn btn-outline-primary"
            data-toggle="modal"
            data-target="#create"
          >
            Create New Account
          </Link>
        }
        pagination
        fixedHeader
        fixedHeaderScrollHeight="400px"
        // Display item checked box
        selectableRows
        // hightlight row in checked box
        selectableRowsHighlight
        // Hightlight when hover
        highlightOnHover
        responsive
      />
      {/* Modal */}
      <div
        className="modal fade"
        id="create"
        tabIndex="-1"
        role="dialog"
        aria-labelledby="exampleModalLabel"
        aria-hidden="true"
      >
        <div className="modal-dialog" role="document">
          <div className="modal-content">
            <div className="modal-header">
              <h5 className="modal-title" id="exampleModalLabel">
                Create New Account
              </h5>
              <button
                type="button"
                className="close border-0 bg-white"
                data-dismiss="modal"
                aria-label="Close"
              >
                <span className="fas fa-close" aria-hidden="true"></span>
              </button>
            </div>
            <form>
              <div className="modal-body">
                <div className="form-group">
                  Full Name:
                  <input
                    type="text"
                    className="form-control"
                    id="recipient-name"
                    placeholder="Your name..."
                  />
                </div>
                <br />
                <div className="form-group">
                  Email:
                  <input
                    type="email"
                    className="form-control"
                    id="message-text"
                    placeholder="Your email: email@example.com,..."
                  />
                </div>
                <br />
                <div className="form-group">
                  Phone Number:
                  <input
                    type="number"
                    className="form-control"
                    id="message-text"
                    placeholder="Phone number: 0123456..."
                  />
                </div>
                <br />
                <div className="form-group">
                  Avatar:
                  <input
                    type="file"
                    className="form-control"
                    id="message-text"
                  />
                </div>
                <br />
                <div className="form-group">
                  Role:
                  <select className="form-select">
                    <option>Select User Roles</option>
                    <option>1</option>
                  </select>
                </div>
              </div>
              <div className="modal-footer">
                <button
                  type="button"
                  className="btn btn-danger"
                  data-dismiss="modal"
                >
                  Cancel
                </button>
                <button type="button" className="btn btn-primary">
                  Add
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </>
  );
}

export default ViewAccount;
