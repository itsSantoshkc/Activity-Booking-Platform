  <style>
      .search-bar {
          display: flex;
          align-items: center;
          background: #EDF2F4;
          padding: 10px 15px 10px 20px;
          border-radius: 40px;
          width: fit-content;
          margin: 40px auto;
          /* Equal 40px spacing above and below */
          box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.15);
          gap: 15px;
      }

      .search-option {
          font-size: 14px;
          font-weight: 700;
          color: #2B2D42;
          cursor: pointer;
          padding: 0 12px;
          white-space: nowrap;
      }

      .bar-divider {
          width: 1px;
          height: 25px;
          background: rgba(0, 0, 0, 0.4);
          flex-shrink: 0;
      }

      .search-circle {
          width: 40px;
          height: 40px;
          border-radius: 50%;
          background: #EF233C;
          border: none;
          color: white;
          font-size: 18px;
          font-weight: 700;
          display: flex;
          align-items: center;
          justify-content: center;
          cursor: pointer;
          transition: 0.3s ease;
          flex-shrink: 0;
          margin-left: 5px;
      }

      .search-circle:hover {
          transform: scale(1.05);
          background: #D90429;
      }
  </style>


  <div class="search-bar">
      <div class="search-option">Destination</div>
      <div class="bar-divider"></div>
      <div class="search-option">Date</div>
      <div class="bar-divider"></div>
      <div class="search-option">No Of People</div>
      <button class="search-circle">
          <i class="fa fa-search" aria-hidden="true"></i>
      </button>
  </div>