"use strict";

var helpers = require("../../helpers/helpers");

exports["Asia/Vladivostok"] = {

	"guess:by:offset" : helpers.makeTestGuess("Asia/Vladivostok", { offset: true, expect: "Australia/Brisbane" }),

	"guess:by:abbr" : helpers.makeTestGuess("Asia/Vladivostok", { abbr: true, expect: "Australia/Brisbane" }),

	"1922" : helpers.makeTestYear("Asia/Vladivostok", [
		["1922-11-14T15:12:28+00:00", "23:59:59", "LMT", -31651 / 60],
		["1922-11-14T15:12:29+00:00", "00:12:29", "+09", -540]
	]),

	"1930" : helpers.makeTestYear("Asia/Vladivostok", [
		["1930-06-20T14:59:59+00:00", "23:59:59", "+09", -540],
		["1930-06-20T15:00:00+00:00", "01:00:00", "+10", -600]
	]),

	"1981" : helpers.makeTestYear("Asia/Vladivostok", [
		["1981-03-31T13:59:59+00:00", "23:59:59", "+10", -600],
		["1981-03-31T14:00:00+00:00", "01:00:00", "+11", -660],
		["1981-09-30T12:59:59+00:00", "23:59:59", "+11", -660],
		["1981-09-30T13:00:00+00:00", "23:00:00", "+10", -600]
	]),

	"1982" : helpers.makeTestYear("Asia/Vladivostok", [
		["1982-03-31T13:59:59+00:00", "23:59:59", "+10", -600],
		["1982-03-31T14:00:00+00:00", "01:00:00", "+11", -660],
		["1982-09-30T12:59:59+00:00", "23:59:59", "+11", -660],
		["1982-09-30T13:00:00+00:00", "23:00:00", "+10", -600]
	]),

	"1983" : helpers.makeTestYear("Asia/Vladivostok", [
		["1983-03-31T13:59:59+00:00", "23:59:59", "+10", -600],
		["1983-03-31T14:00:00+00:00", "01:00:00", "+11", -660],
		["1983-09-30T12:59:59+00:00", "23:59:59", "+11", -660],
		["1983-09-30T13:00:00+00:00", "23:00:00", "+10", -600]
	]),

	"1984" : helpers.makeTestYear("Asia/Vladivostok", [
		["1984-03-31T13:59:59+00:00", "23:59:59", "+10", -600],
		["1984-03-31T14:00:00+00:00", "01:00:00", "+11", -660],
		["1984-09-29T15:59:59+00:00", "02:59:59", "+11", -660],
		["1984-09-29T16:00:00+00:00", "02:00:00", "+10", -600]
	]),

	"1985" : helpers.makeTestYear("Asia/Vladivostok", [
		["1985-03-30T15:59:59+00:00", "01:59:59", "+10", -600],
		["1985-03-30T16:00:00+00:00", "03:00:00", "+11", -660],
		["1985-09-28T15:59:59+00:00", "02:59:59", "+11", -660],
		["1985-09-28T16:00:00+00:00", "02:00:00", "+10", -600]
	]),

	"1986" : helpers.makeTestYear("Asia/Vladivostok", [
		["1986-03-29T15:59:59+00:00", "01:59:59", "+10", -600],
		["1986-03-29T16:00:00+00:00", "03:00:00", "+11", -660],
		["1986-09-27T15:59:59+00:00", "02:59:59", "+11", -660],
		["1986-09-27T16:00:00+00:00", "02:00:00", "+10", -600]
	]),

	"1987" : helpers.makeTestYear("Asia/Vladivostok", [
		["1987-03-28T15:59:59+00:00", "01:59:59", "+10", -600],
		["1987-03-28T16:00:00+00:00", "03:00:00", "+11", -660],
		["1987-09-26T15:59:59+00:00", "02:59:59", "+11", -660],
		["1987-09-26T16:00:00+00:00", "02:00:00", "+10", -600]
	]),

	"1988" : helpers.makeTestYear("Asia/Vladivostok", [
		["1988-03-26T15:59:59+00:00", "01:59:59", "+10", -600],
		["1988-03-26T16:00:00+00:00", "03:00:00", "+11", -660],
		["1988-09-24T15:59:59+00:00", "02:59:59", "+11", -660],
		["1988-09-24T16:00:00+00:00", "02:00:00", "+10", -600]
	]),

	"1989" : helpers.makeTestYear("Asia/Vladivostok", [
		["1989-03-25T15:59:59+00:00", "01:59:59", "+10", -600],
		["1989-03-25T16:00:00+00:00", "03:00:00", "+11", -660],
		["1989-09-23T15:59:59+00:00", "02:59:59", "+11", -660],
		["1989-09-23T16:00:00+00:00", "02:00:00", "+10", -600]
	]),

	"1990" : helpers.makeTestYear("Asia/Vladivostok", [
		["1990-03-24T15:59:59+00:00", "01:59:59", "+10", -600],
		["1990-03-24T16:00:00+00:00", "03:00:00", "+11", -660],
		["1990-09-29T15:59:59+00:00", "02:59:59", "+11", -660],
		["1990-09-29T16:00:00+00:00", "02:00:00", "+10", -600]
	]),

	"1991" : helpers.makeTestYear("Asia/Vladivostok", [
		["1991-03-30T15:59:59+00:00", "01:59:59", "+10", -600],
		["1991-03-30T16:00:00+00:00", "02:00:00", "+10", -600],
		["1991-09-28T16:59:59+00:00", "02:59:59", "+10", -600],
		["1991-09-28T17:00:00+00:00", "02:00:00", "+09", -540]
	]),

	"1992" : helpers.makeTestYear("Asia/Vladivostok", [
		["1992-01-18T16:59:59+00:00", "01:59:59", "+09", -540],
		["1992-01-18T17:00:00+00:00", "03:00:00", "+10", -600],
		["1992-03-28T15:59:59+00:00", "01:59:59", "+10", -600],
		["1992-03-28T16:00:00+00:00", "03:00:00", "+11", -660],
		["1992-09-26T15:59:59+00:00", "02:59:59", "+11", -660],
		["1992-09-26T16:00:00+00:00", "02:00:00", "+10", -600]
	]),

	"1993" : helpers.makeTestYear("Asia/Vladivostok", [
		["1993-03-27T15:59:59+00:00", "01:59:59", "+10", -600],
		["1993-03-27T16:00:00+00:00", "03:00:00", "+11", -660],
		["1993-09-25T15:59:59+00:00", "02:59:59", "+11", -660],
		["1993-09-25T16:00:00+00:00", "02:00:00", "+10", -600]
	]),

	"1994" : helpers.makeTestYear("Asia/Vladivostok", [
		["1994-03-26T15:59:59+00:00", "01:59:59", "+10", -600],
		["1994-03-26T16:00:00+00:00", "03:00:00", "+11", -660],
		["1994-09-24T15:59:59+00:00", "02:59:59", "+11", -660],
		["1994-09-24T16:00:00+00:00", "02:00:00", "+10", -600]
	]),

	"1995" : helpers.makeTestYear("Asia/Vladivostok", [
		["1995-03-25T15:59:59+00:00", "01:59:59", "+10", -600],
		["1995-03-25T16:00:00+00:00", "03:00:00", "+11", -660],
		["1995-09-23T15:59:59+00:00", "02:59:59", "+11", -660],
		["1995-09-23T16:00:00+00:00", "02:00:00", "+10", -600]
	]),

	"1996" : helpers.makeTestYear("Asia/Vladivostok", [
		["1996-03-30T15:59:59+00:00", "01:59:59", "+10", -600],
		["1996-03-30T16:00:00+00:00", "03:00:00", "+11", -660],
		["1996-10-26T15:59:59+00:00", "02:59:59", "+11", -660],
		["1996-10-26T16:00:00+00:00", "02:00:00", "+10", -600]
	]),

	"1997" : helpers.makeTestYear("Asia/Vladivostok", [
		["1997-03-29T15:59:59+00:00", "01:59:59", "+10", -600],
		["1997-03-29T16:00:00+00:00", "03:00:00", "+11", -660],
		["1997-10-25T15:59:59+00:00", "02:59:59", "+11", -660],
		["1997-10-25T16:00:00+00:00", "02:00:00", "+10", -600]
	]),

	"1998" : helpers.makeTestYear("Asia/Vladivostok", [
		["1998-03-28T15:59:59+00:00", "01:59:59", "+10", -600],
		["1998-03-28T16:00:00+00:00", "03:00:00", "+11", -660],
		["1998-10-24T15:59:59+00:00", "02:59:59", "+11", -660],
		["1998-10-24T16:00:00+00:00", "02:00:00", "+10", -600]
	]),

	"1999" : helpers.makeTestYear("Asia/Vladivostok", [
		["1999-03-27T15:59:59+00:00", "01:59:59", "+10", -600],
		["1999-03-27T16:00:00+00:00", "03:00:00", "+11", -660],
		["1999-10-30T15:59:59+00:00", "02:59:59", "+11", -660],
		["1999-10-30T16:00:00+00:00", "02:00:00", "+10", -600]
	]),

	"2000" : helpers.makeTestYear("Asia/Vladivostok", [
		["2000-03-25T15:59:59+00:00", "01:59:59", "+10", -600],
		["2000-03-25T16:00:00+00:00", "03:00:00", "+11", -660],
		["2000-10-28T15:59:59+00:00", "02:59:59", "+11", -660],
		["2000-10-28T16:00:00+00:00", "02:00:00", "+10", -600]
	]),

	"2001" : helpers.makeTestYear("Asia/Vladivostok", [
		["2001-03-24T15:59:59+00:00", "01:59:59", "+10", -600],
		["2001-03-24T16:00:00+00:00", "03:00:00", "+11", -660],
		["2001-10-27T15:59:59+00:00", "02:59:59", "+11", -660],
		["2001-10-27T16:00:00+00:00", "02:00:00", "+10", -600]
	]),

	"2002" : helpers.makeTestYear("Asia/Vladivostok", [
		["2002-03-30T15:59:59+00:00", "01:59:59", "+10", -600],
		["2002-03-30T16:00:00+00:00", "03:00:00", "+11", -660],
		["2002-10-26T15:59:59+00:00", "02:59:59", "+11", -660],
		["2002-10-26T16:00:00+00:00", "02:00:00", "+10", -600]
	]),

	"2003" : helpers.makeTestYear("Asia/Vladivostok", [
		["2003-03-29T15:59:59+00:00", "01:59:59", "+10", -600],
		["2003-03-29T16:00:00+00:00", "03:00:00", "+11", -660],
		["2003-10-25T15:59:59+00:00", "02:59:59", "+11", -660],
		["2003-10-25T16:00:00+00:00", "02:00:00", "+10", -600]
	]),

	"2004" : helpers.makeTestYear("Asia/Vladivostok", [
		["2004-03-27T15:59:59+00:00", "01:59:59", "+10", -600],
		["2004-03-27T16:00:00+00:00", "03:00:00", "+11", -660],
		["2004-10-30T15:59:59+00:00", "02:59:59", "+11", -660],
		["2004-10-30T16:00:00+00:00", "02:00:00", "+10", -600]
	]),

	"2005" : helpers.makeTestYear("Asia/Vladivostok", [
		["2005-03-26T15:59:59+00:00", "01:59:59", "+10", -600],
		["2005-03-26T16:00:00+00:00", "03:00:00", "+11", -660],
		["2005-10-29T15:59:59+00:00", "02:59:59", "+11", -660],
		["2005-10-29T16:00:00+00:00", "02:00:00", "+10", -600]
	]),

	"2006" : helpers.makeTestYear("Asia/Vladivostok", [
		["2006-03-25T15:59:59+00:00", "01:59:59", "+10", -600],
		["2006-03-25T16:00:00+00:00", "03:00:00", "+11", -660],
		["2006-10-28T15:59:59+00:00", "02:59:59", "+11", -660],
		["2006-10-28T16:00:00+00:00", "02:00:00", "+10", -600]
	]),

	"2007" : helpers.makeTestYear("Asia/Vladivostok", [
		["2007-03-24T15:59:59+00:00", "01:59:59", "+10", -600],
		["2007-03-24T16:00:00+00:00", "03:00:00", "+11", -660],
		["2007-10-27T15:59:59+00:00", "02:59:59", "+11", -660],
		["2007-10-27T16:00:00+00:00", "02:00:00", "+10", -600]
	]),

	"2008" : helpers.makeTestYear("Asia/Vladivostok", [
		["2008-03-29T15:59:59+00:00", "01:59:59", "+10", -600],
		["2008-03-29T16:00:00+00:00", "03:00:00", "+11", -660],
		["2008-10-25T15:59:59+00:00", "02:59:59", "+11", -660],
		["2008-10-25T16:00:00+00:00", "02:00:00", "+10", -600]
	]),

	"2009" : helpers.makeTestYear("Asia/Vladivostok", [
		["2009-03-28T15:59:59+00:00", "01:59:59", "+10", -600],
		["2009-03-28T16:00:00+00:00", "03:00:00", "+11", -660],
		["2009-10-24T15:59:59+00:00", "02:59:59", "+11", -660],
		["2009-10-24T16:00:00+00:00", "02:00:00", "+10", -600]
	]),

	"2010" : helpers.makeTestYear("Asia/Vladivostok", [
		["2010-03-27T15:59:59+00:00", "01:59:59", "+10", -600],
		["2010-03-27T16:00:00+00:00", "03:00:00", "+11", -660],
		["2010-10-30T15:59:59+00:00", "02:59:59", "+11", -660],
		["2010-10-30T16:00:00+00:00", "02:00:00", "+10", -600]
	]),

	"2011" : helpers.makeTestYear("Asia/Vladivostok", [
		["2011-03-26T15:59:59+00:00", "01:59:59", "+10", -600],
		["2011-03-26T16:00:00+00:00", "03:00:00", "+11", -660]
	]),

	"2014" : helpers.makeTestYear("Asia/Vladivostok", [
		["2014-10-25T14:59:59+00:00", "01:59:59", "+11", -660],
		["2014-10-25T15:00:00+00:00", "01:00:00", "+10", -600]
	])
};