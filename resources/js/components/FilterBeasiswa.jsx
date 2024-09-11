// import React, { useState } from 'react';

// const FilterBeasiswa = ({ tingkatStudi, negara }) => {
//   const [selectedTingkatStudi, setSelectedTingkatStudi] = useState([]);
//   const [selectedJenisBeasiswa, setSelectedJenisBeasiswa] = useState([]);
//   const [selectedNegara, setSelectedNegara] = useState([]);

//   const handleTingkatStudiChange = (e) => {
//     const { options } = e.target;
//     const values = Array.from(options).filter(option => option.selected).map(option => option.value);
//     setSelectedTingkatStudi(values);
//   };

//   const handleJenisBeasiswaChange = (e) => {
//     const { options } = e.target;
//     const values = Array.from(options).filter(option => option.selected).map(option => option.value);
//     setSelectedJenisBeasiswa(values);
//   };

//   const handleNegaraChange = (e) => {
//     const { options } = e.target;
//     const values = Array.from(options).filter(option => option.selected).map(option => option.value);
//     setSelectedNegara(values);
//   };

//   const handleSubmit = (e) => {
//     e.preventDefault();
//     // Implement form submission logic here
//     console.log({
//       id_tingkat_studi: selectedTingkatStudi,
//       jenis_beasiswa: selectedJenisBeasiswa,
//       id_negara: selectedNegara
//     });
//   };

//   const handleReset = () => {
//     setSelectedTingkatStudi([]);
//     setSelectedJenisBeasiswa([]);
//     setSelectedNegara([]);
//   };

//   return (
//     <div className="col-lg-3">
//       <div className="header mb-4">
//         <h2>Filter Beasiswa</h2>
//       </div>
//       <form id="filterForm" onSubmit={handleSubmit}>
//         {/* Tingkat Studi Filter */}
//         <div className="form-group mt-4">
//           <label htmlFor="option_tingkat_studi">Tingkat Studi</label>
//           <select
//             className="form-control multi-select"
//             name="id_tingkat_studi[]"
//             id="option_tingkat_studi"
//             multiple
//             value={selectedTingkatStudi}
//             onChange={handleTingkatStudiChange}
//           >
//             {tingkatStudi.map(i => (
//               <option key={i.id} value={i.id}>
//                 {i.nama}
//               </option>
//             ))}
//           </select>
//         </div>

//         {/* Jenis Beasiswa Filter */}
//         <div className="form-group mt-4">
//           <label htmlFor="option_jenis_beasiswa">Jenis Beasiswa</label>
//           <select
//             className="form-control multi-select"
//             name="jenis_beasiswa[]"
//             id="option_jenis_beasiswa"
//             multiple
//             value={selectedJenisBeasiswa}
//             onChange={handleJenisBeasiswaChange}
//           >
//             <option value="Partial">Partial</option>
//             <option value="Full">Full</option>
//           </select>
//         </div>

//         {/* Negara Filter */}
//         <div className="form-group mt-4">
//           <label htmlFor="option_negara">Negara</label>
//           <select
//             className="form-control multi-select"
//             name="id_negara[]"
//             id="option_negara"
//             multiple
//             value={selectedNegara}
//             onChange={handleNegaraChange}
//           >
//             {negara.map(i => (
//               <option key={i.id} value={i.id}>
//                 {i.nama}
//               </option>
//             ))}
//           </select>
//         </div>

//         <button type="submit" className="btn btn-primary mt-3">Apply Filters</button>
//         <button type="button" className="btn btn-warning mt-3" onClick={handleReset}>Reset Filters</button>
//       </form>
//     </div>
//   );
// };

// export default FilterBeasiswa;
