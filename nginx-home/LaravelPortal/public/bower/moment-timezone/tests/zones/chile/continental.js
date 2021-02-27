"use strict";

var helpers = require("../../helpers/helpers");

exports["Chile/Continental"] = {

	"guess:by:offset" : helpers.makeTestGuess("Chile/Continental", { offset: true, expect: "America/Santiago" }),

	"guess:by:abbr" : helpers.makeTestGuess("Chile/Continental", { abbr: true, expect: "America/Santiago" }),

	"1910" : helpers.makeTestYear("Chile/Continental", [
		["1910-01-10T04:42:45+00:00", "23:59:59", "SMT", 16966 / 60],
		["1910-01-10T04:42:46+00:00", "23:42:46", "-05", 300]
	]),

	"1916" : helpers.makeTestYear("Chile/Continental", [
		["1916-07-01T04:59:59+00:00", "23:59:59", "-05", 300],
		["1916-07-01T05:00:00+00:00", "00:17:14", "SMT", 16966 / 60]
	]),

	"1918" : helpers.makeTestYear("Chile/Continental", [
		["1918-09-10T04:42:45+00:00", "23:59:59", "SMT", 16966 / 60],
		["1918-09-10T04:42:46+00:00", "00:42:46", "-04", 240]
	]),

	"1919" : helpers.makeTestYear("Chile/Continental", [
		["1919-07-01T03:59:59+00:00", "23:59:59", "-04", 240],
		["1919-07-01T04:00:00+00:00", "23:17:14", "SMT", 16966 / 60]
	]),

	"1927" : helpers.makeTestYear("Chile/Continental", [
		["1927-09-01T04:42:45+00:00", "23:59:59", "SMT", 16966 / 60],
		["1927-09-01T04:42:46+00:00", "00:42:46", "-04", 240]
	]),

	"1928" : helpers.makeTestYear("Chile/Continental", [
		["1928-04-01T03:59:59+00:00", "23:59:59", "-04", 240],
		["1928-04-01T04:00:00+00:00", "23:00:00", "-05", 300],
		["1928-09-01T04:59:59+00:00", "23:59:59", "-05", 300],
		["1928-09-01T05:00:00+00:00", "01:00:00", "-04", 240]
	]),

	"1929" : helpers.makeTestYear("Chile/Continental", [
		["1929-04-01T03:59:59+00:00", "23:59:59", "-04", 240],
		["1929-04-01T04:00:00+00:00", "23:00:00", "-05", 300],
		["1929-09-01T04:59:59+00:00", "23:59:59", "-05", 300],
		["1929-09-01T05:00:00+00:00", "01:00:00", "-04", 240]
	]),

	"1930" : helpers.makeTestYear("Chile/Continental", [
		["1930-04-01T03:59:59+00:00", "23:59:59", "-04", 240],
		["1930-04-01T04:00:00+00:00", "23:00:00", "-05", 300],
		["1930-09-01T04:59:59+00:00", "23:59:59", "-05", 300],
		["1930-09-01T05:00:00+00:00", "01:00:00", "-04", 240]
	]),

	"1931" : helpers.makeTestYear("Chile/Continental", [
		["1931-04-01T03:59:59+00:00", "23:59:59", "-04", 240],
		["1931-04-01T04:00:00+00:00", "23:00:00", "-05", 300],
		["1931-09-01T04:59:59+00:00", "23:59:59", "-05", 300],
		["1931-09-01T05:00:00+00:00", "01:00:00", "-04", 240]
	]),

	"1932" : helpers.makeTestYear("Chile/Continental", [
		["1932-04-01T03:59:59+00:00", "23:59:59", "-04", 240],
		["1932-04-01T04:00:00+00:00", "23:00:00", "-05", 300],
		["1932-09-01T04:59:59+00:00", "23:59:59", "-05", 300],
		["1932-09-01T05:00:00+00:00", "01:00:00", "-04", 240]
	]),

	"1942" : helpers.makeTestYear("Chile/Continental", [
		["1942-06-01T03:59:59+00:00", "23:59:59", "-04", 240],
		["1942-06-01T04:00:00+00:00", "23:00:00", "-05", 300],
		["1942-08-01T04:59:59+00:00", "23:59:59", "-05", 300],
		["1942-08-01T05:00:00+00:00", "01:00:00", "-04", 240]
	]),

	"1946" : helpers.makeTestYear("Chile/Continental", [
		["1946-07-15T03:59:59+00:00", "23:59:59", "-04", 240],
		["1946-07-15T04:00:00+00:00", "01:00:00", "-03", 180],
		["1946-09-01T02:59:59+00:00", "23:59:59", "-03", 180],
		["1946-09-01T03:00:00+00:00", "23:00:00", "-04", 240]
	]),

	"1947" : helpers.makeTestYear("Chile/Continental", [
		["1947-04-01T03:59:59+00:00", "23:59:59", "-04", 240],
		["1947-04-01T04:00:00+00:00", "23:00:00", "-05", 300],
		["1947-05-22T03:59:59+00:00", "22:59:59", "-05", 300],
		["1947-05-22T04:00:00+00:00", "00:00:00", "-04", 240]
	]),

	"1968" : helpers.makeTestYear("Chile/Continental", [
		["1968-11-03T03:59:59+00:00", "23:59:59", "-04", 240],
		["1968-11-03T04:00:00+00:00", "01:00:00", "-03", 180]
	]),

	"1969" : helpers.makeTestYear("Chile/Continental", [
		["1969-03-30T02:59:59+00:00", "23:59:59", "-03", 180],
		["1969-03-30T03:00:00+00:00", "23:00:00", "-04", 240],
		["1969-11-23T03:59:59+00:00", "23:59:59", "-04", 240],
		["1969-11-23T04:00:00+00:00", "01:00:00", "-03", 180]
	]),

	"1970" : helpers.makeTestYear("Chile/Continental", [
		["1970-03-29T02:59:59+00:00", "23:59:59", "-03", 180],
		["1970-03-29T03:00:00+00:00", "23:00:00", "-04", 240],
		["1970-10-11T03:59:59+00:00", "23:59:59", "-04", 240],
		["1970-10-11T04:00:00+00:00", "01:00:00", "-03", 180]
	]),

	"1971" : helpers.makeTestYear("Chile/Continental", [
		["1971-03-14T02:59:59+00:00", "23:59:59", "-03", 180],
		["1971-03-14T03:00:00+00:00", "23:00:00", "-04", 240],
		["1971-10-10T03:59:59+00:00", "23:59:59", "-04", 240],
		["1971-10-10T04:00:00+00:00", "01:00:00", "-03", 180]
	]),

	"1972" : helpers.makeTestYear("Chile/Continental", [
		["1972-03-12T02:59:59+00:00", "23:59:59", "-03", 180],
		["1972-03-12T03:00:00+00:00", "23:00:00", "-04", 240],
		["1972-10-15T03:59:59+00:00", "23:59:59", "-04", 240],
		["1972-10-15T04:00:00+00:00", "01:00:00", "-03", 180]
	]),

	"1973" : helpers.makeTestYear("Chile/Continental", [
		["1973-03-11T02:59:59+00:00", "23:59:59", "-03", 180],
		["1973-03-11T03:00:00+00:00", "23:00:00", "-04", 240],
		["1973-09-30T03:59:59+00:00", "23:59:59", "-04", 240],
		["1973-09-30T04:00:00+00:00", "01:00:00", "-03", 180]
	]),

	"1974" : helpers.makeTestYear("Chile/Continental", [
		["1974-03-10T02:59:59+00:00", "23:59:59", "-03", 180],
		["1974-03-10T03:00:00+00:00", "23:00:00", "-04", 240],
		["1974-10-13T03:59:59+00:00", "23:59:59", "-04", 240],
		["1974-10-13T04:00:00+00:00", "01:00:00", "-03", 180]
	]),

	"1975" : helpers.makeTestYear("Chile/Continental", [
		["1975-03-09T02:59:59+00:00", "23:59:59", "-03", 180],
		["1975-03-09T03:00:00+00:00", "23:00:00", "-04", 240],
		["1975-10-12T03:59:59+00:00", "23:59:59", "-04", 240],
		["1975-10-12T04:00:00+00:00", "01:00:00", "-03", 180]
	]),

	"1976" : helpers.makeTestYear("Chile/Continental", [
		["1976-03-14T02:59:59+00:00", "23:59:59", "-03", 180],
		["1976-03-14T03:00:00+00:00", "23:00:00", "-04", 240],
		["1976-10-10T03:59:59+00:00", "23:59:59", "-04", 240],
		["1976-10-10T04:00:00+00:00", "01:00:00", "-03", 180]
	]),

	"1977" : helpers.makeTestYear("Chile/Continental", [
		["1977-03-13T02:59:59+00:00", "23:59:59", "-03", 180],
		["1977-03-13T03:00:00+00:00", "23:00:00", "-04", 240],
		["1977-10-09T03:59:59+00:00", "23:59:59", "-04", 240],
		["1977-10-09T04:00:00+00:00", "01:00:00", "-03", 180]
	]),

	"1978" : helpers.makeTestYear("Chile/Continental", [
		["1978-03-12T02:59:59+00:00", "23:59:59", "-03", 180],
		["1978-03-12T03:00:00+00:00", "23:00:00", "-04", 240],
		["1978-10-15T03:59:59+00:00", "23:59:59", "-04", 240],
		["1978-10-15T04:00:00+00:00", "01:00:00", "-03", 180]
	]),

	"1979" : helpers.makeTestYear("Chile/Continental", [
		["1979-03-11T02:59:59+00:00", "23:59:59", "-03", 180],
		["1979-03-11T03:00:00+00:00", "23:00:00", "-04", 240],
		["1979-10-14T03:59:59+00:00", "23:59:59", "-04", 240],
		["1979-10-14T04:00:00+00:00", "01:00:00", "-03", 180]
	]),

	"1980" : helpers.makeTestYear("Chile/Continental", [
		["1980-03-09T02:59:59+00:00", "23:59:59", "-03", 180],
		["1980-03-09T03:00:00+00:00", "23:00:00", "-04", 240],
		["1980-10-12T03:59:59+00:00", "23:59:59", "-04", 240],
		["1980-10-12T04:00:00+00:00", "01:00:00", "-03", 180]
	]),

	"1981" : helpers.makeTestYear("Chile/Continental", [
		["1981-03-15T02:59:59+00:00", "23:59:59", "-03", 180],
		["1981-03-15T03:00:00+00:00", "23:00:00", "-04", 240],
		["1981-10-11T03:59:59+00:00", "23:59:59", "-04", 240],
		["1981-10-11T04:00:00+00:00", "01:00:00", "-03", 180]
	]),

	"1982" : helpers.makeTestYear("Chile/Continental", [
		["1982-03-14T02:59:59+00:00", "23:59:59", "-03", 180],
		["1982-03-14T03:00:00+00:00", "23:00:00", "-04", 240],
		["1982-10-10T03:59:59+00:00", "23:59:59", "-04", 240],
		["1982-10-10T04:00:00+00:00", "01:00:00", "-03", 180]
	]),

	"1983" : helpers.makeTestYear("Chile/Continental", [
		["1983-03-13T02:59:59+00:00", "23:59:59", "-03", 180],
		["1983-03-13T03:00:00+00:00", "23:00:00", "-04", 240],
		["1983-10-09T03:59:59+00:00", "23:59:59", "-04", 240],
		["1983-10-09T04:00:00+00:00", "01:00:00", "-03", 180]
	]),

	"1984" : helpers.makeTestYear("Chile/Continental", [
		["1984-03-11T02:59:59+00:00", "23:59:59", "-03", 180],
		["1984-03-11T03:00:00+00:00", "23:00:00", "-04", 240],
		["1984-10-14T03:59:59+00:00", "23:59:59", "-04", 240],
		["1984-10-14T04:00:00+00:00", "01:00:00", "-03", 180]
	]),

	"1985" : helpers.makeTestYear("Chile/Continental", [
		["1985-03-10T02:59:59+00:00", "23:59:59", "-03", 180],
		["1985-03-10T03:00:00+00:00", "23:00:00", "-04", 240],
		["1985-10-13T03:59:59+00:00", "23:59:59", "-04", 240],
		["1985-10-13T04:00:00+00:00", "01:00:00", "-03", 180]
	]),

	"1986" : helpers.makeTestYear("Chile/Continental", [
		["1986-03-09T02:59:59+00:00", "23:59:59", "-03", 180],
		["1986-03-09T03:00:00+00:00", "23:00:00", "-04", 240],
		["1986-10-12T03:59:59+00:00", "23:59:59", "-04", 240],
		["1986-10-12T04:00:00+00:00", "01:00:00", "-03", 180]
	]),

	"1987" : helpers.makeTestYear("Chile/Continental", [
		["1987-04-12T02:59:59+00:00", "23:59:59", "-03", 180],
		["1987-04-12T03:00:00+00:00", "23:00:00", "-04", 240],
		["1987-10-11T03:59:59+00:00", "23:59:59", "-04", 240],
		["1987-10-11T04:00:00+00:00", "01:00:00", "-03", 180]
	]),

	"1988" : helpers.makeTestYear("Chile/Continental", [
		["1988-03-13T02:59:59+00:00", "23:59:59", "-03", 180],
		["1988-03-13T03:00:00+00:00", "23:00:00", "-04", 240],
		["1988-10-09T03:59:59+00:00", "23:59:59", "-04", 240],
		["1988-10-09T04:00:00+00:00", "01:00:00", "-03", 180]
	]),

	"1989" : helpers.makeTestYear("Chile/Continental", [
		["1989-03-12T02:59:59+00:00", "23:59:59", "-03", 180],
		["1989-03-12T03:00:00+00:00", "23:00:00", "-04", 240],
		["1989-10-15T03:59:59+00:00", "23:59:59", "-04", 240],
		["1989-10-15T04:00:00+00:00", "01:00:00", "-03", 180]
	]),

	"1990" : helpers.makeTestYear("Chile/Continental", [
		["1990-03-11T02:59:59+00:00", "23:59:59", "-03", 180],
		["1990-03-11T03:00:00+00:00", "23:00:00", "-04", 240],
		["1990-09-16T03:59:59+00:00", "23:59:59", "-04", 240],
		["1990-09-16T04:00:00+00:00", "01:00:00", "-03", 180]
	]),

	"1991" : helpers.makeTestYear("Chile/Continental", [
		["1991-03-10T02:59:59+00:00", "23:59:59", "-03", 180],
		["1991-03-10T03:00:00+00:00", "23:00:00", "-04", 240],
		["1991-10-13T03:59:59+00:00", "23:59:59", "-04", 240],
		["1991-10-13T04:00:00+00:00", "01:00:00", "-03", 180]
	]),

	"1992" : helpers.makeTestYear("Chile/Continental", [
		["1992-03-15T02:59:59+00:00", "23:59:59", "-03", 180],
		["1992-03-15T03:00:00+00:00", "23:00:00", "-04", 240],
		["1992-10-11T03:59:59+00:00", "23:59:59", "-04", 240],
		["1992-10-11T04:00:00+00:00", "01:00:00", "-03", 180]
	]),

	"1993" : helpers.makeTestYear("Chile/Continental", [
		["1993-03-14T02:59:59+00:00", "23:59:59", "-03", 180],
		["1993-03-14T03:00:00+00:00", "23:00:00", "-04", 240],
		["1993-10-10T03:59:59+00:00", "23:59:59", "-04", 240],
		["1993-10-10T04:00:00+00:00", "01:00:00", "-03", 180]
	]),

	"1994" : helpers.makeTestYear("Chile/Continental", [
		["1994-03-13T02:59:59+00:00", "23:59:59", "-03", 180],
		["1994-03-13T03:00:00+00:00", "23:00:00", "-04", 240],
		["1994-10-09T03:59:59+00:00", "23:59:59", "-04", 240],
		["1994-10-09T04:00:00+00:00", "01:00:00", "-03", 180]
	]),

	"1995" : helpers.makeTestYear("Chile/Continental", [
		["1995-03-12T02:59:59+00:00", "23:59:59", "-03", 180],
		["1995-03-12T03:00:00+00:00", "23:00:00", "-04", 240],
		["1995-10-15T03:59:59+00:00", "23:59:59", "-04", 240],
		["1995-10-15T04:00:00+00:00", "01:00:00", "-03", 180]
	]),

	"1996" : helpers.makeTestYear("Chile/Continental", [
		["1996-03-10T02:59:59+00:00", "23:59:59", "-03", 180],
		["1996-03-10T03:00:00+00:00", "23:00:00", "-04", 240],
		["1996-10-13T03:59:59+00:00", "23:59:59", "-04", 240],
		["1996-10-13T04:00:00+00:00", "01:00:00", "-03", 180]
	]),

	"1997" : helpers.makeTestYear("Chile/Continental", [
		["1997-03-30T02:59:59+00:00", "23:59:59", "-03", 180],
		["1997-03-30T03:00:00+00:00", "23:00:00", "-04", 240],
		["1997-10-12T03:59:59+00:00", "23:59:59", "-04", 240],
		["1997-10-12T04:00:00+00:00", "01:00:00", "-03", 180]
	]),

	"1998" : helpers.makeTestYear("Chile/Continental", [
		["1998-03-15T02:59:59+00:00", "23:59:59", "-03", 180],
		["1998-03-15T03:00:00+00:00", "23:00:00", "-04", 240],
		["1998-09-27T03:59:59+00:00", "23:59:59", "-04", 240],
		["1998-09-27T04:00:00+00:00", "01:00:00", "-03", 180]
	]),

	"1999" : helpers.makeTestYear("Chile/Continental", [
		["1999-04-04T02:59:59+00:00", "23:59:59", "-03", 180],
		["1999-04-04T03:00:00+00:00", "23:00:00", "-04", 240],
		["1999-10-10T03:59:59+00:00", "23:59:59", "-04", 240],
		["1999-10-10T04:00:00+00:00", "01:00:00", "-03", 180]
	]),

	"2000" : helpers.makeTestYear("Chile/Continental", [
		["2000-03-12T02:59:59+00:00", "23:59:59", "-03", 180],
		["2000-03-12T03:00:00+00:00", "23:00:00", "-04", 240],
		["2000-10-15T03:59:59+00:00", "23:59:59", "-04", 240],
		["2000-10-15T04:00:00+00:00", "01:00:00", "-03", 180]
	]),

	"2001" : helpers.makeTestYear("Chile/Continental", [
		["2001-03-11T02:59:59+00:00", "23:59:59", "-03", 180],
		["2001-03-11T03:00:00+00:00", "23:00:00", "-04", 240],
		["2001-10-14T03:59:59+00:00", "23:59:59", "-04", 240],
		["2001-10-14T04:00:00+00:00", "01:00:00", "-03", 180]
	]),

	"2002" : helpers.makeTestYear("Chile/Continental", [
		["2002-03-10T02:59:59+00:00", "23:59:59", "-03", 180],
		["2002-03-10T03:00:00+00:00", "23:00:00", "-04", 240],
		["2002-10-13T03:59:59+00:00", "23:59:59", "-04", 240],
		["2002-10-13T04:00:00+00:00", "01:00:00", "-03", 180]
	]),

	"2003" : helpers.makeTestYear("Chile/Continental", [
		["2003-03-09T02:59:59+00:00", "23:59:59", "-03", 180],
		["2003-03-09T03:00:00+00:00", "23:00:00", "-04", 240],
		["2003-10-12T03:59:59+00:00", "23:59:59", "-04", 240],
		["2003-10-12T04:00:00+00:00", "01:00:00", "-03", 180]
	]),

	"2004" : helpers.makeTestYear("Chile/Continental", [
		["2004-03-14T02:59:59+00:00", "23:59:59", "-03", 180],
		["2004-03-14T03:00:00+00:00", "23:00:00", "-04", 240],
		["2004-10-10T03:59:59+00:00", "23:59:59", "-04", 240],
		["2004-10-10T04:00:00+00:00", "01:00:00", "-03", 180]
	]),

	"2005" : helpers.makeTestYear("Chile/Continental", [
		["2005-03-13T02:59:59+00:00", "23:59:59", "-03", 180],
		["2005-03-13T03:00:00+00:00", "23:00:00", "-04", 240],
		["2005-10-09T03:59:59+00:00", "23:59:59", "-04", 240],
		["2005-10-09T04:00:00+00:00", "01:00:00", "-03", 180]
	]),

	"2006" : helpers.makeTestYear("Chile/Continental", [
		["2006-03-12T02:59:59+00:00", "23:59:59", "-03", 180],
		["2006-03-12T03:00:00+00:00", "23:00:00", "-04", 240],
		["2006-10-15T03:59:59+00:00", "23:59:59", "-04", 240],
		["2006-10-15T04:00:00+00:00", "01:00:00", "-03", 180]
	]),

	"2007" : helpers.makeTestYear("Chile/Continental", [
		["2007-03-11T02:59:59+00:00", "23:59:59", "-03", 180],
		["2007-03-11T03:00:00+00:00", "23:00:00", "-04", 240],
		["2007-10-14T03:59:59+00:00", "23:59:59", "-04", 240],
		["2007-10-14T04:00:00+00:00", "01:00:00", "-03", 180]
	]),

	"2008" : helpers.makeTestYear("Chile/Continental", [
		["2008-03-30T02:59:59+00:00", "23:59:59", "-03", 180],
		["2008-03-30T03:00:00+00:00", "23:00:00", "-04", 240],
		["2008-10-12T03:59:59+00:00", "23:59:59", "-04", 240],
		["2008-10-12T04:00:00+00:00", "01:00:00", "-03", 180]
	]),

	"2009" : helpers.makeTestYear("Chile/Continental", [
		["2009-03-15T02:59:59+00:00", "23:59:59", "-03", 180],
		["2009-03-15T03:00:00+00:00", "23:00:00", "-04", 240],
		["2009-10-11T03:59:59+00:00", "23:59:59", "-04", 240],
		["2009-10-11T04:00:00+00:00", "01:00:00", "-03", 180]
	]),

	"2010" : helpers.makeTestYear("Chile/Continental", [
		["2010-04-04T02:59:59+00:00", "23:59:59", "-03", 180],
		["2010-04-04T03:00:00+00:00", "23:00:00", "-04", 240],
		["2010-10-10T03:59:59+00:00", "23:59:59", "-04", 240],
		["2010-10-10T04:00:00+00:00", "01:00:00", "-03", 180]
	]),

	"2011" : helpers.makeTestYear("Chile/Continental", [
		["2011-05-08T02:59:59+00:00", "23:59:59", "-03", 180],
		["2011-05-08T03:00:00+00:00", "23:00:00", "-04", 240],
		["2011-08-21T03:59:59+00:00", "23:59:59", "-04", 240],
		["2011-08-21T04:00:00+00:00", "01:00:00", "-03", 180]
	]),

	"2012" : helpers.makeTestYear("Chile/Continental", [
		["2012-04-29T02:59:59+00:00", "23:59:59", "-03", 180],
		["2012-04-29T03:00:00+00:00", "23:00:00", "-04", 240],
		["2012-09-02T03:59:59+00:00", "23:59:59", "-04", 240],
		["2012-09-02T04:00:00+00:00", "01:00:00", "-03", 180]
	]),

	"2013" : helpers.makeTestYear("Chile/Continental", [
		["2013-04-28T02:59:59+00:00", "23:59:59", "-03", 180],
		["2013-04-28T03:00:00+00:00", "23:00:00", "-04", 240],
		["2013-09-08T03:59:59+00:00", "23:59:59", "-04", 240],
		["2013-09-08T04:00:00+00:00", "01:00:00", "-03", 180]
	]),

	"2014" : helpers.makeTestYear("Chile/Continental", [
		["2014-04-27T02:59:59+00:00", "23:59:59", "-03", 180],
		["2014-04-27T03:00:00+00:00", "23:00:00", "-04", 240],
		["2014-09-07T03:59:59+00:00", "23:59:59", "-04", 240],
		["2014-09-07T04:00:00+00:00", "01:00:00", "-03", 180]
	]),

	"2016" : helpers.makeTestYear("Chile/Continental", [
		["2016-05-15T02:59:59+00:00", "23:59:59", "-03", 180],
		["2016-05-15T03:00:00+00:00", "23:00:00", "-04", 240],
		["2016-08-14T03:59:59+00:00", "23:59:59", "-04", 240],
		["2016-08-14T04:00:00+00:00", "01:00:00", "-03", 180]
	]),

	"2017" : helpers.makeTestYear("Chile/Continental", [
		["2017-05-14T02:59:59+00:00", "23:59:59", "-03", 180],
		["2017-05-14T03:00:00+00:00", "23:00:00", "-04", 240],
		["2017-08-13T03:59:59+00:00", "23:59:59", "-04", 240],
		["2017-08-13T04:00:00+00:00", "01:00:00", "-03", 180]
	]),

	"2018" : helpers.makeTestYear("Chile/Continental", [
		["2018-05-13T02:59:59+00:00", "23:59:59", "-03", 180],
		["2018-05-13T03:00:00+00:00", "23:00:00", "-04", 240],
		["2018-08-12T03:59:59+00:00", "23:59:59", "-04", 240],
		["2018-08-12T04:00:00+00:00", "01:00:00", "-03", 180]
	]),

	"2019" : helpers.makeTestYear("Chile/Continental", [
		["2019-04-07T02:59:59+00:00", "23:59:59", "-03", 180],
		["2019-04-07T03:00:00+00:00", "23:00:00", "-04", 240],
		["2019-09-08T03:59:59+00:00", "23:59:59", "-04", 240],
		["2019-09-08T04:00:00+00:00", "01:00:00", "-03", 180]
	]),

	"2020" : helpers.makeTestYear("Chile/Continental", [
		["2020-04-05T02:59:59+00:00", "23:59:59", "-03", 180],
		["2020-04-05T03:00:00+00:00", "23:00:00", "-04", 240],
		["2020-09-06T03:59:59+00:00", "23:59:59", "-04", 240],
		["2020-09-06T04:00:00+00:00", "01:00:00", "-03", 180]
	]),

	"2021" : helpers.makeTestYear("Chile/Continental", [
		["2021-04-04T02:59:59+00:00", "23:59:59", "-03", 180],
		["2021-04-04T03:00:00+00:00", "23:00:00", "-04", 240],
		["2021-09-05T03:59:59+00:00", "23:59:59", "-04", 240],
		["2021-09-05T04:00:00+00:00", "01:00:00", "-03", 180]
	]),

	"2022" : helpers.makeTestYear("Chile/Continental", [
		["2022-04-03T02:59:59+00:00", "23:59:59", "-03", 180],
		["2022-04-03T03:00:00+00:00", "23:00:00", "-04", 240],
		["2022-09-04T03:59:59+00:00", "23:59:59", "-04", 240],
		["2022-09-04T04:00:00+00:00", "01:00:00", "-03", 180]
	]),

	"2023" : helpers.makeTestYear("Chile/Continental", [
		["2023-04-02T02:59:59+00:00", "23:59:59", "-03", 180],
		["2023-04-02T03:00:00+00:00", "23:00:00", "-04", 240],
		["2023-09-03T03:59:59+00:00", "23:59:59", "-04", 240],
		["2023-09-03T04:00:00+00:00", "01:00:00", "-03", 180]
	]),

	"2024" : helpers.makeTestYear("Chile/Continental", [
		["2024-04-07T02:59:59+00:00", "23:59:59", "-03", 180],
		["2024-04-07T03:00:00+00:00", "23:00:00", "-04", 240],
		["2024-09-08T03:59:59+00:00", "23:59:59", "-04", 240],
		["2024-09-08T04:00:00+00:00", "01:00:00", "-03", 180]
	]),

	"2025" : helpers.makeTestYear("Chile/Continental", [
		["2025-04-06T02:59:59+00:00", "23:59:59", "-03", 180],
		["2025-04-06T03:00:00+00:00", "23:00:00", "-04", 240],
		["2025-09-07T03:59:59+00:00", "23:59:59", "-04", 240],
		["2025-09-07T04:00:00+00:00", "01:00:00", "-03", 180]
	]),

	"2026" : helpers.makeTestYear("Chile/Continental", [
		["2026-04-05T02:59:59+00:00", "23:59:59", "-03", 180],
		["2026-04-05T03:00:00+00:00", "23:00:00", "-04", 240],
		["2026-09-06T03:59:59+00:00", "23:59:59", "-04", 240],
		["2026-09-06T04:00:00+00:00", "01:00:00", "-03", 180]
	]),

	"2027" : helpers.makeTestYear("Chile/Continental", [
		["2027-04-04T02:59:59+00:00", "23:59:59", "-03", 180],
		["2027-04-04T03:00:00+00:00", "23:00:00", "-04", 240],
		["2027-09-05T03:59:59+00:00", "23:59:59", "-04", 240],
		["2027-09-05T04:00:00+00:00", "01:00:00", "-03", 180]
	]),

	"2028" : helpers.makeTestYear("Chile/Continental", [
		["2028-04-02T02:59:59+00:00", "23:59:59", "-03", 180],
		["2028-04-02T03:00:00+00:00", "23:00:00", "-04", 240],
		["2028-09-03T03:59:59+00:00", "23:59:59", "-04", 240],
		["2028-09-03T04:00:00+00:00", "01:00:00", "-03", 180]
	]),

	"2029" : helpers.makeTestYear("Chile/Continental", [
		["2029-04-08T02:59:59+00:00", "23:59:59", "-03", 180],
		["2029-04-08T03:00:00+00:00", "23:00:00", "-04", 240],
		["2029-09-02T03:59:59+00:00", "23:59:59", "-04", 240],
		["2029-09-02T04:00:00+00:00", "01:00:00", "-03", 180]
	]),

	"2030" : helpers.makeTestYear("Chile/Continental", [
		["2030-04-07T02:59:59+00:00", "23:59:59", "-03", 180],
		["2030-04-07T03:00:00+00:00", "23:00:00", "-04", 240],
		["2030-09-08T03:59:59+00:00", "23:59:59", "-04", 240],
		["2030-09-08T04:00:00+00:00", "01:00:00", "-03", 180]
	]),

	"2031" : helpers.makeTestYear("Chile/Continental", [
		["2031-04-06T02:59:59+00:00", "23:59:59", "-03", 180],
		["2031-04-06T03:00:00+00:00", "23:00:00", "-04", 240],
		["2031-09-07T03:59:59+00:00", "23:59:59", "-04", 240],
		["2031-09-07T04:00:00+00:00", "01:00:00", "-03", 180]
	]),

	"2032" : helpers.makeTestYear("Chile/Continental", [
		["2032-04-04T02:59:59+00:00", "23:59:59", "-03", 180],
		["2032-04-04T03:00:00+00:00", "23:00:00", "-04", 240],
		["2032-09-05T03:59:59+00:00", "23:59:59", "-04", 240],
		["2032-09-05T04:00:00+00:00", "01:00:00", "-03", 180]
	]),

	"2033" : helpers.makeTestYear("Chile/Continental", [
		["2033-04-03T02:59:59+00:00", "23:59:59", "-03", 180],
		["2033-04-03T03:00:00+00:00", "23:00:00", "-04", 240],
		["2033-09-04T03:59:59+00:00", "23:59:59", "-04", 240],
		["2033-09-04T04:00:00+00:00", "01:00:00", "-03", 180]
	]),

	"2034" : helpers.makeTestYear("Chile/Continental", [
		["2034-04-02T02:59:59+00:00", "23:59:59", "-03", 180],
		["2034-04-02T03:00:00+00:00", "23:00:00", "-04", 240],
		["2034-09-03T03:59:59+00:00", "23:59:59", "-04", 240],
		["2034-09-03T04:00:00+00:00", "01:00:00", "-03", 180]
	]),

	"2035" : helpers.makeTestYear("Chile/Continental", [
		["2035-04-08T02:59:59+00:00", "23:59:59", "-03", 180],
		["2035-04-08T03:00:00+00:00", "23:00:00", "-04", 240],
		["2035-09-02T03:59:59+00:00", "23:59:59", "-04", 240],
		["2035-09-02T04:00:00+00:00", "01:00:00", "-03", 180]
	]),

	"2036" : helpers.makeTestYear("Chile/Continental", [
		["2036-04-06T02:59:59+00:00", "23:59:59", "-03", 180],
		["2036-04-06T03:00:00+00:00", "23:00:00", "-04", 240],
		["2036-09-07T03:59:59+00:00", "23:59:59", "-04", 240],
		["2036-09-07T04:00:00+00:00", "01:00:00", "-03", 180]
	]),

	"2037" : helpers.makeTestYear("Chile/Continental", [
		["2037-04-05T02:59:59+00:00", "23:59:59", "-03", 180],
		["2037-04-05T03:00:00+00:00", "23:00:00", "-04", 240],
		["2037-09-06T03:59:59+00:00", "23:59:59", "-04", 240],
		["2037-09-06T04:00:00+00:00", "01:00:00", "-03", 180]
	])
};